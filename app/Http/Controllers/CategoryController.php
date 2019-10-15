<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    private $category;
    private $category_child;
    private $product;
    private $image;
    private $arr;

    public function show($id)
    {
        $this->arr = [];

        try {
            $this->category = Category::with(['categories.products'])->findOrFail($id);

            if (!$this->category->parent_id) {
                foreach ($this->category->categories as $this->category_child) {
                    foreach ($this->category_child->products as $this->product) {
                        $this->image = $this->product->images->first();
                        array_push($this->arr, [$this->product, $this->image]);
                    }
                }
            } else {
                foreach ($this->category->products as $this->product) {
                    $this->image = $this->product->images->first();
                    array_push($this->arr, [$this->product, $this->image]);
                }
            }
        } catch(Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        return view('products.product', ['products' => $this->arr]);
    }
}
