<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProductPut;
<<<<<<< HEAD
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Size\SizeRepositoryInterface;
=======
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Size\SizeRepository;
>>>>>>> parent of 764837b... Revert "Admin manager product."
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPost;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
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
<<<<<<< HEAD
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        SizeRepositoryInterface $sizeRepository,
        ImageRepositoryInterface $imageRepository
=======
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        SizeRepository $sizeRepository
>>>>>>> parent of 764837b... Revert "Admin manager product."
    ){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sizeRepository = $sizeRepository;
<<<<<<< HEAD
        $this->imageRepository = $imageRepository;
=======
>>>>>>> parent of 764837b... Revert "Admin manager product."
    }

    public function index()
    {
        $products = $this->productRepository->getWith(['images', 'sizes']);
<<<<<<< HEAD

=======
>>>>>>> parent of 764837b... Revert "Admin manager product."
        $arr = [];

        if ($products) {
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

        return back();
    }

    public function create()
    {
<<<<<<< HEAD
        $categories = $this->categoryRepository->getChildCategory();
        $sizes = $this->sizeRepository->getAll();
=======
        $categories = Category::where('parent_id', '<>', null)->get();

        $sizes = Size::all();
>>>>>>> parent of 764837b... Revert "Admin manager product."

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
            $image_name = time() . $image->getClientOriginalName();
            $destination_path = storage_path(config('admin.upload_image'));
            $image->move($destination_path, $image_name);

<<<<<<< HEAD
            $product = $this->productRepository->create($data_save);
            $product_id = $product->id;
            $product = $this->productRepository->find($product_id);
=======
            $product = Product::create($data_save);
            $product_id = $product->id;
            $product = Product::find($product_id);
>>>>>>> parent of 764837b... Revert "Admin manager product."
            $product->sizes()->sync($data['product_size']);

            $image = new Image();
            $image->image = $image_name;
            $image->product_id = $product_id;
            $image->save();
            $flag = true;
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('config.product_fail'));
        }

        return redirect()->back()->with('status', __('product.product_success'));
    }

    public function delete(Request $request)
    {
        $data = $request->only([
            'product_id',
        ]);
        $product_id = $data['product_id'];

<<<<<<< HEAD
        $flag = $this->productRepository->delete($product_id);
=======
        try {
            $product = Product::findOrFail($product_id);
            $product->delete();
            $flag = true;
        } catch (\Exception $e) {
            $flag = false;
        }
>>>>>>> parent of 764837b... Revert "Admin manager product."

        $result = [
            'flag' => $flag,
        ];

        return response()->json($result);
    }

    public function edit($id)
    {
<<<<<<< HEAD
        $product = $this->productRepository->getWith(['sizes', 'images'])->find($id);
        if ($product) {
            $image = $product->images->last()->image;
            $sizes = $product->sizes;
            $flag = true;
        } else {
=======
        try {
            $product = Product::with(['sizes', 'images'])->findOrFail($id);
            $image = $product->images->first()->image;
            $sizes = $product->sizes;
            $flag = true;
        } catch (\Exception $e) {
>>>>>>> parent of 764837b... Revert "Admin manager product."
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
<<<<<<< HEAD
            if ($request->hasFile('product_image')) {
                $image_type = $data_receive['product_image']->getClientOriginalExtension();
                if (in_array($image_type, config('admin.extension_image'))) {
                    $product = $this->productRepository->update($id, $data_save);
                    if ($product) {
                        $product_id = $product->id;
                        $product = $this->productRepository->find($product_id);
                        $product->sizes()->detach();
                        $product->sizes()->sync(json_decode($data_receive['product_size'], true));
                    }
=======
            $product = Product::findOrfail($id);
            $product->update($data_save);

            $product_id = $product->id;
            $product = Product::find($product_id);
            $product->sizes()->detach();
            $product->sizes()->sync(json_decode($data_receive['product_size'], true));

            if ($request->hasFile('product_image')) {
                $image_type = $data_receive['product_image']->getClientOriginalExtension();
                if (in_array($image_type, config('admin.extension_image'))) {
>>>>>>> parent of 764837b... Revert "Admin manager product."
                    $image = $data_receive['product_image'];
                    $image_name = time() . $image->getClientOriginalName();
                    $destination_path = storage_path(config('admin.upload_image'));
                    $image->move($destination_path, $image_name);
                    $data = [
                        'product_id' => $product_id,
                        'image' => $image_name,
                    ];
<<<<<<< HEAD
                    $this->imageRepository->create($data);
=======
                    Image::create($data);
>>>>>>> parent of 764837b... Revert "Admin manager product."
                } else {
                    return response()->json($data_response);
                }
            }
<<<<<<< HEAD
            $product = $this->productRepository->update($id, $data_save);
            if ($product) {
                $product_id = $product->id;
                $product = $this->productRepository->find($product_id);
                $product->sizes()->detach();
                $product->sizes()->sync(json_decode($data_receive['product_size'], true));
            }
=======
>>>>>>> parent of 764837b... Revert "Admin manager product."
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
