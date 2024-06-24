<?php

namespace datnguyen\cart\Http\Controllers;
use Illuminate\Http\Request;
use datnguyen\product\Models\Product;
use datnguyen\cart\Models\Order;
use datnguyen\cart\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use datnguyen\user\Repositories\UserRepository;
use datnguyen\post\Repositories\PostRepository;
use datnguyen\post\Repositories\PostCategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use datnguyen\cart\Repositories\CouponRepository;

class CouponController extends Controller
{
    /**
     * Display a listing of the coupons.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $coupons = CouponRepository::all();
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Store a newly created coupon in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:coupons',
            'discount_amount' => 'required|numeric',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date',
            'usage_limit' => 'required|numeric',
        ]);

        $coupon = CouponRepository::create($data);

        return redirect()->route('coupons.index')
                        ->with('success', 'Coupon created successfully.');
    }
    

    
}
