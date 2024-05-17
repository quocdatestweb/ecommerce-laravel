<?php

namespace datnguyen\cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
