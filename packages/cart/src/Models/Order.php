<?php

namespace datnguyen\cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_number', 'name', 'email', 'phone_number', 'address', 'total_amount'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getTotalAmount()
    {
        $total = 0;
        if ($this->orderItems && $this->orderItems->count() > 0) {
            foreach ($this->orderItems as $orderProduct) {
                $total += $orderProduct->price * $orderProduct->quantity;
            }
        }
        return $total;
    }
}