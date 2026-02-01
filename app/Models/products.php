<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'description'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
