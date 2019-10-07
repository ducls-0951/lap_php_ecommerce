<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $products;
    private $arr;
    private $sum;
    private $count;
    private $image;
    private $rate_avg;

    public function topRateProduct()
    {
        $products = Product::with(['rates', 'images'])->get();
        $arr = [];

        foreach ($products as $product) {
            $sum = $product->rates->sum('rating');
            $count = $product->rates->count('rating');
            $image = $product->images->first();

            if ($count > 0 && ($sum / $count) >= config('top_rate.rate_avg') )  {
                array_push($arr, [$product, $image]);
            }
        }

        return view('homepage', ['products' => $arr]);
    }
}
