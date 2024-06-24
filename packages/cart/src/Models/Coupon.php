<?php

namespace datnguyen\cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'discount_amount',
        'valid_from',
        'valid_to',
        'usage_limit',
        'used_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
    ];

    /**
     * Determine if the coupon is valid.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return now()->between($this->valid_from, $this->valid_to)
            && $this->used_count < $this->usage_limit;
    }

    /**
     * Increment the used count of the coupon.
     *
     * @return bool
     */
    public function incrementUsedCount(): bool
    {
        return $this->increment('used_count');
    }

    // Other model properties and methods

    public function calculateDiscount($total)
    {
        // Check if the coupon is valid
        if ($this->isValid()) {
            // Calculate the discount amount based on the coupon's properties
            if ($this->discount_amount > 0) {
                return $this->discount_amount;
            } elseif ($this->discount_percentage > 0) {
                return $total * ($this->discount_percentage / 100);
            }
        }

        // Return 0 if the coupon is not valid or does not have a valid discount
        return 0;
    }

    // public function isValid()
    // {
    //     // Check if the coupon is active and within the valid date range
    //     $now = Carbon::now();
    //     return $this->is_active && $now->between($this->valid_from, $this->valid_to);
    // }
}