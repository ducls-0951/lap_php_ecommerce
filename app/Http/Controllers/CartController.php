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
    private $product_id;
    private $product_num;
    private $total_price;
    private $carts;
    private $cart = [];
    private $cookie;
    private $results;
    private $data;
    private $count;
    private $flag;

    public function index(Request $request)
    {
        $this->carts = unserialize($request->cookie('cart'));
        if ($this->carts) {
            foreach ($this->carts as $cart) {
                $this->total_price += $cart['sub_total'];
            }

            return view('carts.cart_list', ['carts' => $this->carts, 'total_price' => $this->total_price]);
        } else {
            return view('carts.cart_list', ['carts' => '', 'total_price' => 0]);
        }
    }

    public function addToCart(Request $request)
    {
        $this->data = $request->only([
            'product_id',
            'num_product',
            'size',
        ]);

        try {
            $this->product = Product::with('images')->findOrFail($this->data['product_id']);
            $this->product_image = $this->product->images
                ->first();
            $this->product_detail = [
                'product_id' => $this->data['product_id'],
                'product_name' => $this->product->name,
                'product_image' => $this->product_image->image,
                'quantity' => (int)$this->data['num_product'],
                'price' => $this->product->price,
                'size' => $this->data['size'],
                'sub_total' => (int)$this->data['num_product'] * $this->product->price,
            ];
        } catch (Exception $e) {
            return back()->with($e->getMessage());
        }

        return $this->store($this->data['product_id'], $this->product_detail, $request);
    }

    public function store($key, $product, $request)
    {
        $this->cart = unserialize($request->cookie('cart'));

        if ($this->cart) {
            if (isset($this->cart[$key])) {
                $this->cart[$key]['quantity'] += $product['quantity'];
                $this->cart[$key]['sub_total'] += $product['quantity'] * $product['price'];
                $this->cookie = cookie('cart', serialize($this->cart), config('cart.time_expire'));
            } else {
                $this->cart += [$key => $product];
                $this->cookie = cookie('cart', serialize($this->cart), config('cart.time_expire'));
            }
        } else {
            $this->cart[$key] = $product;
            $this->cookie = cookie('cart', serialize($this->cart), config('cart.time_expire'));
        }

        $this->carts = unserialize($this->cookie->getValue());

        $this->flag = true;

        $this->count = count($this->carts);

        $this->results = [
            'flag' => $this->flag,
            'count' => $this->count,
        ];

        return response()->json($this->results)->withCookie($this->cookie);
    }

    public function show(Request $request)
    {
        $this->cart = unserialize($request->cookie('cart'));

        $this->count = count($this->cart);

        $this->results = [
            'count' => $this->count,
            'products' => $this->cart,
        ];

        return response()->json($this->results);
    }

    public function updateCart(Request $request)
    {
        $this->cart = unserialize($request->cookie('cart'));

        if ($this->cart) {
            foreach ($this->cart as $cart) {
                $this->data = $request->only([
                    'product_id_' . $cart['product_id'],
                    'product_num_' . $cart['product_id'],
                ]);
                $this->product_id = $this->data['product_id_' . $cart['product_id']];
                $this->product_num = $this->data['product_num_' . $cart['product_id']];
                if ($this->product_id && $this->product_num >= config('cart.product_num')) {
                    $this->cart[$this->product_id]['quantity'] = $this->product_num;
                    $this->cart[$this->product_id]['sub_total'] = $this->product_num * $this->cart[$this->product_id]['price'];
                    $this->cookie = cookie('cart', serialize($this->cart), config('cart.time_expire'));
                }
            }

            $this->carts = unserialize($this->cookie->getValue());

            foreach ($this->carts as $cart) {
                $this->total_price += $cart['sub_total'];
            }
        }

        return response()->view('carts.cart_list', [
            'carts' => $this->carts,
            'total_price' => $this->total_price,
        ])->withCookie($this->cookie);
    }

    public function deleteCart(Request $request)
    {
        $this->data = $request->only([
            'product_id',
        ]);

        $this->product_id = $this->data['product_id'];
        $this->cart = unserialize($request->cookie('cart'));
        $this->count = count($this->cart);

        if (isset($this->cart[$this->product_id])) {
            unset($this->cart[$this->product_id]);
            $this->cookie = cookie('cart', serialize($this->cart), config('time.expire'));
            $this->flag = true;
        } else {
            $this->flag = false;
        }

        $this->data = [
            'flag' => $this->flag,
            'count' => $this->count,
        ];

        return response()->json($this->data)->withCookie($this->cookie);
    }
}
