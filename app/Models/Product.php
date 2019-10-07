<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'price_sale',
        'category_id',
        'description',
        'color',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
