<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderPost;
use App\Mail\OrderMail;
use App\Models\Order_Detail;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    private $total_price;
    private $total_quantity;
    private $cookie;
    private $orderRepository;
    private $orderDetailRepository;
    private $order;

    public function __construct(OrderRepositoryInterface $orderRepository, OrderDetailRepositoryInterface $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function store(StoreOrderPost $request)
    {
        $carts = unserialize($request->cookie('cart'));

        DB::beginTransaction();
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

                $this->order = $this->orderRepository->create($data_save);

                foreach ($carts as $cart) {
                    $data_save = [
                        'quantity' => $cart['quantity'],
                        'price' => $cart['price'],
                        'product_id' => $cart['product_id'],
                        'order_id' => $this->order->id,
                    ];

                    $order_detail = $this->orderDetailRepository->create($data_save);
                    $this->cookie = cookie('cart', '', config('time.expire'));
                }
            }

            $user = auth()->user();
            Mail::to($user)->send(new OrderMail($this->order));
            DB::commit();

            return redirect()->back()->with('status', __('order.order_successfully'))->withCookie($this->cookie);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('msg', __('order.order_fail'));
        }
    }
}
