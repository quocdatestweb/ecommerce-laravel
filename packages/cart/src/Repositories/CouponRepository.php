<?php

namespace datnguyen\cart\Repositories;

use datnguyen\product\Models\Product;
use datnguyen\product\Models\Coupon;
use datnguyen\cart\Interfaces\CouponRepositoryInterface;

class CouponRepository implements  CouponRepositoryInterface
{

     /**
     * Find a coupon by its code.
     *
     * @param string $code
     * @return \App\Models\Coupon|null
     */
    public static function findByCode(string $code)
    {
        return Coupon::where('code', $code)->first();
    }

    /**
     * Create a new coupon.
     *
     * @param array $data
     * @return \App\Models\Coupon
     */
    public static function create(array $data)
    {
        return Coupon::create($data);
    }

    /**
     * Update an existing coupon.
     *
     * @param \App\Models\Coupon $coupon
     * @param array $data
     * @return bool
     */
    public static function update(Coupon $coupon, array $data)
    {
        return $coupon->update($data);
    }

    /**
     * Delete a coupon.
     *
     * @param \App\Models\Coupon $coupon
     * @return bool|null
     */
    public static function delete(Coupon $coupon)
    {
        return $coupon->delete();
    }

    /**
     * Get all coupons.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all()
    {
        return Coupon::all();
    }
}
