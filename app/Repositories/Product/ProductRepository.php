<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositories;
use Illuminate\Support\Facades\Cookie;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{
    private $preview = [];

    public function getModel()
    {
        return Product::class;
    }

    public function topRateProduct($data = [])
    {
        $arr = [];

        foreach ($data as $product) {
            $sum = $product->rates->sum('rating');
            $count = $product->rates->count('rating');
            $image = $product->images->last();

            if ($count > 0 && ($sum / $count) >= config('top_rate.rate_avg')) {
                array_push($arr, [$product, $image]);
            }
        }

        return $arr;
    }
}
