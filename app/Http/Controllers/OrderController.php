<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderPost;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    private $total_price;
    private $total_quantity;
    private $cookie;
    private $orderRepository;
    private $orderDetailRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, OrderDetailRepositoryInterface $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function store(StoreOrderPost $request)
    {
        $carts = unserialize($request->cookie('cart'));

        try {
            if ($carts) {
                $user_id = auth()->id();
                $data = $request->only([
                    'address',
                    'phone',
                ]);
                $this->total_quantity = count($carts);

                foreach ($carts as $cart) {
                    $this->total_price += $cart['sub_total'];
                }

                $data_save = [
                    'user_id' => $user_id,
                    'total_quantity' => $this->total_quantity,
                    'total_price' => $this->total_price,
                    'address' => $data['address'],
                    'telephone' => $data['phone'],
                    'status' => config('order.processing'),
                ];

                $order = $this->orderRepository->create($data_save);

                foreach ($carts as $cart) {
                    $data_save = [
                        'quantity' => $cart['quantity'],
                        'price' => $cart['price'],
                        'product_id' => $cart['product_id'],
                        'order_id' => $order->id,
                    ];

                    $order_detail = $this->orderDetailRepository->create($data_save);
                    $this->cookie = cookie('cart', '', config('time.expire'));
                }
            }

            return redirect()->back()->with('status', __('order.order_successfully'))->withCookie($this->cookie);
        } catch (\Exception $e) {
            return redirect()->back()->with('msg', __('order.order_fail'))->withCookies($this->cookie);
        }
    }
}
