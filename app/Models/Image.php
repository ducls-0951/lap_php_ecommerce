<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image',
        'category_id',
    ];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
