<?php

namespace App\Providers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    private $count;
    private $carts;
    private $categories;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
            $this->count = count($this->carts);
        } catch (DecryptException $e) {

        }

        View::share('categories', $this->categories);
        View::share('count', $this->count);
    }
}
