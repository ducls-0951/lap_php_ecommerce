<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProductPut;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPost;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;
    private $sizeRepository;
    private $imageRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository,
        SizeRepositoryInterface $sizeRepository
    ){
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sizeRepository = $sizeRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getWith(['images', 'sizes']);
        $arr = [];

        foreach ($products as $product) {
            $product_image = $product->images->last();
            $product_sizes = $product->sizes;
            $arr_size = [];
            foreach ($product_sizes as $size) {
                array_push($arr_size, $size->name);
            }

            array_push($arr, [$product, $product_image, implode(' ', $arr_size)]);
        }

        return view('admin.products.show', ['products' => $arr]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->whereNotNull('parent_id');

        $sizes = $this->sizeRepository->all();

        return view('admin.products.create', ['categories' => $categories, 'sizes' => $sizes]);
    }

    public function store(StoreProductPost $request)
    {
        $data = $request->only([
            'product_name',
            'product_quantity',
            'product_price',
            'product_price_sale',
            'product_category',
            'product_size',
            'product_description',
        ]);

        $data_save = [
            'name' => $data['product_name'],
            'quantity' => $data['product_quantity'],
            'price' => $data['product_price'],
            'price_sale' => $data['product_price_sale'],
            'category_id' => $data['product_category'],
            'description' => $data['product_description'],
        ];

        try {
            $image = $request->file('product_image');
            $image_name = $this->imageRepository->uploadImage($image, config('admin.upload_image'));

            $product = $this->productRepository->create($data_save);
            $product_id = $product->id;
            $product = $this->productRepository->find($product_id);
            $product->sizes()->sync($data['product_size']);

            $image = new Image();
            $image->image = $image_name;
            $image->product_id = $product_id;
            $image->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('product.product_fail'));
        }

        return redirect()->back()->with('status', __('product.product_success'));
    }

    public function delete(Request $request)
    {
        $data = $request->only([
            'product_id',
        ]);
        $product_id = $data['product_id'];

        $product = $this->productRepository->delete($product_id);

        if ($product) {
            $flag = true;
        } else {
            $flag = false;
        }

        $result = [
            'flag' => $flag,
        ];

        return response()->json($result);
    }

    public function edit($id)
    {
        $product = $this->productRepository->getWithFind($id, ['sizes', 'images']);

        if ($product) {
            $image = $product->images->last()->image;
            $sizes = $product->sizes;
            $flag = true;
        } else {
            $flag = false;
        }

        $data = [
            'product' => $product,
            'sizes' => $sizes,
            'image' => $image,
            'flag' => $flag,
        ];

        return response()->json($data);
    }

    public function update(UpdateProductPut $request, $id)
    {
        $data_receive = $request->only([
            'product_name',
            'product_quantity',
            'product_price',
            'product_price_sale',
            'product_category',
            'product_size',
            'product_image',
            'product_description',
        ]);
        $flag = false;

        $data_save = [
            'name' => $data_receive['product_name'],
            'quantity' => $data_receive['product_quantity'],
            'price' => $data_receive['product_price'],
            'price_sale' => $data_receive['product_price_sale'],
            'category_id' => $data_receive['product_category'],
            'description' => $data_receive['product_description'],
        ];
        $data_response = [];

        DB::beginTransaction();
        try {
            if ($request->hasFile('product_image')) {
                $image_name = $this->imageRepository->uploadImage($data_receive['product_image'], config('admin.upload_image'));

                if ($image_name) {
                    $product = $this->productRepository->update($id, $data_save);
                    $product_id = $product->id;
                    $product = $this->productRepository->find($product_id);
                    $product->sizes()->detach();
                    $product->sizes()->sync(json_decode($data_receive['product_size']), true);
                    $data = [
                        'product_id' => $product->id,
                        'image' => $image_name,
                    ];

                    $this->imageRepository->create($data);
                } else {
                    return response()->json($data_response);
                }
            } else {
                $product = $this->productRepository->update($id, $data_save);
                $product_id = $product->id;
                $product = $this->productRepository->find($product_id);
                $product->sizes()->detach();
                $product->sizes()->sync(json_decode($data_receive['product_size']), true);
            }
            DB::commit();
            $data_response = [
                'product_info' => $product,
                'product_category' => $product->category->name,
                'product_size' => $product->sizes,
                'product_image' => $product->images->last(),
            ];
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return response()->json($data_response);
    }
}
