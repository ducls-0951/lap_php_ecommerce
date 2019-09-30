<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_quantity',
        'total_price',
        'address',
        'telephone',
        'status',
    ];

    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
