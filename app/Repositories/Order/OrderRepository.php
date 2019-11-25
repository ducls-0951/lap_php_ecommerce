<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepositories;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }
}
