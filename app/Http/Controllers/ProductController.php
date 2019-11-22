<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    protected $productRepository;
    private $preview = [];

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $arr = [];
        $products = $this->productRepository->getWith(['images']);

        foreach ($products as $product) {
            $image = $product->images->last();
            array_push($arr, [$product, $image]);
        }

        return view('products.product', ['products' => $arr]);
    }

    public function topRateProduct()
    {
        $data = $this->productRepository->getWith(['rates', 'images']);
        $arr = $this->productRepository->topRateProduct($data);

        return view('homepage', ['products' => $arr]);
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

        $this->preview = unserialize(Cookie::get('preview'));

        if ($product) {
            if ($this->preview) {
                if (!in_array($product->id, $this->preview)) {
                    array_push($this->preview, $product->id);
                }
            } else {
                $this->preview += $product->id;
            }

            return response()
                ->view('products.product_detail', ['product' => $product])
                ->withCookie(cookie('preview', serialize($this->preview), 360));
        }

        return back();
    }

    public function recentlyViewed()
    {
        $arr = [];
        $products = $this->productRepository->getWith(['rates', 'images']);
        $this->preview = unserialize(Cookie::get('preview'));
        foreach ($products as $product) {
            if (in_array($product->id, $this->preview)) {
                $image = $product->images->last();
                array_push($arr, [$product, $image]);
            }
        }

        return view('homepage', ['products' => $arr]);
    }
}
