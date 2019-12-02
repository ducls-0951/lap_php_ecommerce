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

        $suggest = $this->suggestRepository->create($dataSave);

        return view('user.')
    }
}
