<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'stock_quantity',
        'category',
        'image',
        'status',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
