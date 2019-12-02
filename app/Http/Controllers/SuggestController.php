<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuggestPost;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    private $imageRepository;
    private $suggestRepository;

    public function __construct(
        ImageRepositoryInterface $imageRepository,
        SuggestRepositoryInterface $suggestRepository
    ){
        $this->imageRepository = $imageRepository;
        $this->suggestRepository = $suggestRepository;
    }

    public function index()
    {
        return view('user.suggest');
    }


    public function store(StoreSuggestPost $request)
    {
        $dataReceive = $request->only([
            'product_name',
            'product_price',
            'product_description',
            'product_image',
        ]);

        $imageName = $this->imageRepository->uploadImage($dataReceive['product_image'], config('image.image_path'));

        $dataSave = [
            'product_name' => $dataReceive['product_name'],
            'description' => $dataReceive['product_description'],
            'image' => $imageName,
            'price' => $dataReceive['product_price'],
            'status' => config('suggest.process'),
            'user_id' => auth()->id(),
        ];

        $this->suggestRepository->create($dataSave);

        return $this->listSuggest();
    }

    public function listSuggest()
    {
        $suggests = $this->suggestRepository->getAll();

        return view('user.list_suggest', ['suggests' => $suggests]);
    }

    public function cancelSuggest($id)
    {
        $suggest = $this->suggestRepository->update($id, ['status' => config('suggest.cancel')]);

        if ($suggest) {
            return response()->json(['flag' => true]);
        }

        return response()->json(['flag' => false]);
    }

    public function edit($id)
    {
        $suggest = $this->suggestRepository->find($id);

        if ($suggest) {
            return response()->json([
                'suggest' => $suggest,
                'flag' => true,
            ]);
        }

        return response()->json(['flag' => false]);
    }

    public function updateSuggest($id, Request $request)
    {
        $dataReceive = $request->only([
            'product_name',
            'product_price',
            'product_description',
            'product_image',
        ]);

        if (isset($dataReceive['product_image'])) {
            $imageName = $this->imageRepository->uploadImage($dataReceive['product_image'], config('image.image_path'));

            $dataSave = [
                'product_name' => $dataReceive['product_name'],
                'description' => $dataReceive['product_description'],
                'price' => $dataReceive['product_price'],
                'image' => $imageName,
            ];
        } else {
            $dataSave = [
                'product_name' => $dataReceive['product_name'],
                'description' => $dataReceive['product_description'],
                'price' => $dataReceive['product_price'],
            ];
        }

        $suggest = $this->suggestRepository->update($id, $dataSave);
        if ($suggest) {
            return response()->json([
                'suggest' => $suggest,
                'flag' => true,
            ]);
        }

        return response()->json([
            'flag' => false,
        ]);
    }
}
