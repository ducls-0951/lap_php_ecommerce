<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.master');
    }

    public function index_user()
    {
        return view('admin.user_show');
    }

    public function index_order()
    {
        return view('admin.order_show');
    }

    public function index_category()
    {
        return view('admin.category_show');
    }

    public function create_product()
    {
        return view('admin.product_create');
    }
}
