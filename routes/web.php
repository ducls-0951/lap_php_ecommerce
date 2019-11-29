<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();

Route::get('/', 'ProductController@topRateProduct')->name('products.top_rate');
Route::get('/recently-viewed', 'ProductController@recentlyViewed')->name('products.recently_viewed');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/all', 'ProductController@index')->name('products.index');
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');

Route::prefix('admin')->group(function() {
    Route::get('products/index', 'Admin\ProductController@index')->name('admin.index_product');
    Route::get('products/create', 'Admin\ProductController@create')->name('admin.create_product');
    Route::post('products/store', 'Admin\ProductController@store')->name('admin.store_product');
    Route::delete('products/delete', 'Admin\ProductController@delete')->name('admin.delete_product');
    Route::get('orders/index', 'Admin\OrderController@index')->name('admin.index_order');
    Route::put('orders/{order}', 'Admin\OrderController@update')->name('admin.update_order');
    Route::delete('orders/{order}', 'Admin\OrderController@destroy')->name('admin.cancel_order');
    Route::get('index_user', 'AdminController@index_user')->name('admin.index_user');
    Route::get('index_category', 'AdminController@index_category')->name('admin.index_category');
});

Route::prefix('cart')->group(function() {
    Route::get('/index', 'CartController@index')->name('carts.index');
    Route::post('/add-to-cart', 'CartController@addToCart')->name('carts.add_to_cart');
    Route::get('/show', 'CartController@show')->name('carts.show');
    Route::post('/updateCart', 'CartController@updateCart')->name('carts.updateCart');
    Route::delete('/deleteCart', 'CartController@deleteCart')->name('carts.deleteCart');
});

Route::prefix('orders')->group(function () {
    Route::post('/checkout', 'OrderController@store')->name('orders.store')->middleware('auth');
});

Route::prefix('users')->group(function () {
    Route::get('/{user}', 'UserController@show')->name('users.show')->middleware('auth');
    Route::put('/{user}', 'UserController@update')->name('users.update');
});
