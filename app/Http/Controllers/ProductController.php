<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    private $products;
    protected $arr;
    private $sum;
    private $count;
    private $image;
    private $rate_avg;
    private $product;

    public function index()
    {
        $this->arr = [];
        $this->products = Product::with('images')->get();

        foreach ($this->products as $product) {
            $this->image = $product->images()->first();
            array_push($this->arr, [$product, $this->image]);
        }

        return view('products.product', ['products' => $this->arr]);
    }

    public function topRateProduct()
    {
        $this->arr = [];
        $this->products = Product::with(['rates', 'images'])->get();

        foreach ($this->products as $product) {
            $this->sum = $product->rates->sum('rating');
            $this->count = $product->rates->count('rating');
            $this->image = $product->images->first();

            if ($this->count > 0 && ($this->sum / $this->count) >= config('top_rate.rate_avg') )  {
                array_push($this->arr, [$product, $this->image]);
            }
        }

        return view('homepage', ['products' => $this->arr]);
    }

    public function show($id)
    {
        try {
            $this->product = Product::findOrFail($id);

            if (session()->get('products.recently_viewed') != $this->product->id) {
                session()->push('products.recently_viewed', $this->product->id);
            }
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        return view('products.product_detail', ['product' => $this->product]);
    }

    public function recentlyViewed()
    {
        $this->arr = [];

        if(session()->get('products.recently_viewed')) {
            $this->products = Product::with('rates', 'images')->whereIn('id', session()->get('products.recently_viewed'))->get();

            foreach ($this->products as $this->product) {
                $this->image = $this->product->images->first();
                array_push($this->arr, [$this->product, $this->image]);
            }
        }

        return view('homepage', ['products' => $this->arr]);
    }
}
