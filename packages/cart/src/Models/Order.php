<?php

namespace datnguyen\cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'address'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
