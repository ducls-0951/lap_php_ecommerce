<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
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
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        return $this->categoryRepository = $categoryRepository;
    }

    public function show($id)
    {
        $this->arr = [];
        $this->category = $this->categoryRepository->getWith('categories.products')->find($id);

        if ($this->category) {
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

            return view('products.product', ['products' => $this->arr]);
        }

        return back();
    }
}
