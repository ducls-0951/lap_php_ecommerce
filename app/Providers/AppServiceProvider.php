<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Size;

class AppServiceProvider extends ServiceProvider
{
    private $count;
    private $carts;
    private $sizes;
    private $categories;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class
        );

        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->singleton(
            ImageRepositoryInterface::class,
            ImageRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->categories = Category::all();

        try {
            $this->carts = (Crypt::decrypt(Cookie::get('cart'), true));
            if ($this->carts) {
                $this->count = count($this->carts);
            } else {
                $this->count = 0;
            }
        } catch (DecryptException $e) {

        }

        $this->sizes = Size::all();

        View::share('categories', $this->categories);
        View::share('sizes', $this->sizes);
        View::share('count', $this->count);
    }
}
