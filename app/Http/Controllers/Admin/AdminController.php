<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function chart()
    {
        $years = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->get();

        return view('admin.chart.chart', ['years' => $years]);
    }

    public function countOrder(Request $request)
    {
        $year = $request['year'];
        $totalOrder = [];
        $month = [];

        $orders = DB::table('orders')
            ->select(DB::raw('count(id) as total, MONTH(created_at) as month'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        foreach ($orders as $order) {
            array_push($totalOrder, $order->total);
            array_push($month, $order->month);
        }

        $dataResponse = [
            'totalOrder' => $totalOrder,
            'month' => $month,
        ];

        return response()->json($dataResponse);
    }
}
