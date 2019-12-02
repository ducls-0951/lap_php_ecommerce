<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;
use Exception;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAll();

        return view('admin.orders.show', ['orders' => $orders]);
    }

    public function update($id)
    {
        $order = $this->orderRepository->update($id, ['status' => config('order.resolved')]);
        if ($order) {
            $flag = true;
        } else {
            $flag = false;
        }

        $data = [
            'flag' => $flag,
        ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $order = $this->orderRepository->update($id, ['status' => config('order.cancel')]);

        if ($order) {
            $flag = true;
        } else {
            $flag = false;
        }

        $data = [
            'flag' => $flag,
        ];

        return response()->json($data);
    }
}
