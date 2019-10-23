<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class CartController extends Controller
{
    private $price;
    private $product;
    private $product_detail;
    private $product_image;
    private $cart = [];
    private $cookie;
    private $results;

    public function index()
    {
        return view('carts.cart_list');
    }

    public function addToCart(Request $request)
    {
        $data = $request->only([
            'product_id',
            'num_product',
            'size',
        ]);

        try {
            $this->product = Product::with('images')->findOrFail($data['product_id']);
            $this->product_image = $this->product->images->first();
            $this->product_detail = [
                'product_id' => $data['product_id'],
                'product_name' => $this->product->name,
                'product_image' => $this->product_image->image,
                'quantity' => (int)$data['num_product'],
                'price' => $this->product->price,
                'size' => $data['size'],
                'sub_total' => (int)$data['num_product'] * $this->product->price,
            ];
        } catch (Exception $e) {
            return back()->with($e->getMessage());
        }

        return $this->store($data['product_id'], $this->product_detail, $request);
    }

    public function store($key, $product, $request)
    {
        $this->cart = unserialize($request->cookie('cart'));

        if ($this->cart) {
            if (isset($this->cart[$key])) {
                $this->cart[$key]['quantity'] += $product['quantity'];
                $this->cart[$key]['sub_total'] += $product['quantity'] * $product['price'];
                $this->cookie = cookie('cart', serialize($this->cart), 120);
            } else {
                $this->cart += [$key => $product];
                $this->cookie = cookie('cart', serialize($this->cart), 120);
            }
        } else {
            $this->cart[$key] = $product;
            $this->cookie = cookie('cart', serialize($this->cart), 120);
        }

        $flag = true;

        return response()->json($flag)->withCookie($this->cookie);
    }

    public function show(Request $request)
    {
        $this->results = unserialize($request->cookie('cart'));

        return response()->json($this->results);
    }
}
