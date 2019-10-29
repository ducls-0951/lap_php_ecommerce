<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPost;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Image;
use Mockery\Exception;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images', 'sizes')->get();
        $arr = [];

        foreach ($products as $product) {
            $product_image = $product->images->first();
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
        $categories = Category::where('parent_id', '<>', null)->get();

        $sizes = Size::all();

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

            $product = Product::create($data_save);
            $product_id = $product->id;
            $product = Product::find($product_id);
            $product->sizes()->sync($data['product_size']);

            $image = new Image();
            $image->image = $image_name;
            $image->product_id = $product_id;
            $image->save();
            $flag = true;
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Create product fail!');
        }

        return redirect()->back()->with('status', 'Create product successfully!');
    }

    public function delete(Request $request)
    {
        $data = $request->only([
            'product_id',
        ]);
        $product_id = $data['product_id'];

        try {
            $product = Product::findOrFail($product_id);
            $product->delete();
            $flag = true;
        } catch (\Exception $e) {
            $flag = false;
        }

        $result = [
            'flag' => $flag,
        ];

        return response()->json($result);
    }
}
