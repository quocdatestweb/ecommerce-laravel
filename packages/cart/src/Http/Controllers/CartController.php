<?php

namespace datnguyen\cart\Http\Controllers;
use Illuminate\Http\Request;
use datnguyen\product\Models\Product;
use datnguyen\cart\Models\Order;
use datnguyen\cart\Models\OrderItem;
use datnguyen\cart\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use datnguyen\user\Repositories\UserRepository;
use datnguyen\post\Repositories\PostRepository;
use datnguyen\post\Repositories\PostCategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository,UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->userRepository = $userRepository;

    }

    public function viewCart()
    {
        $cart = Session::get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check

        return view('carts::viewcart', compact('cart', 'products','name','id_user'));
    }

    public function checkOut()
    {
        $cart = Session::get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $auth_admin = Auth::guard('admin')->user();

        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $email = $auth_admin ? $auth_admin->email : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('carts::checkout', compact('cart', 'products','name','email','id_user'));
    }



    public function addToCart(Request $request)
    {
        $productId = $request->input('id_product');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }

        $quantity = $request->input('quantity');
        $total = $quantity * $product->Price;

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $product->Name,
                'price' => $product->Price,
                'quantity' => $quantity,
                'total' => $total,
                'img_src' => $product->ThumbImage,

            ];
        }

        Session::put('cart', $cart);
        $count = count($cart); // Calculate the count of products in the cart
        Session::put('cart_count', $count); // Set the count in the cart session

        return back()->with('success', 'Product added to cart successfully');
    }

    public function isValid($customerId): bool
        {
            $now = now();
            return $this->valid_from <= $now && $now <= $this->valid_to && ($this->usage_limit === null || $this->used_count < $this->usage_limit) && ($this->customer_id === null || $this->customer_id === $customerId);
        }

    // public function placeOrder(Request $request)
    // {
    //     $order = new Order();

    //     $order_number = mt_rand(100000, 999999);
    //     $order->order_number = $order_number;
    //     $order->name = $request->input('full-name');
    //     $order->email = $request->input('email');
    //     $order->phone_number = $request->input('tel');
    //     $order->address = $request->input('address');
    //     $order->id_user = $request->input('id_user');
    //         // Retrieve the coupon code and apply the discount
    //     $couponCode = $request->input('coupon-code');
    //     $discount = 0;
    //     if ($couponCode) {
    //         $coupon = Coupon::where('code', $couponCode)->first();
    //         if ($coupon && $coupon->isValid()) {
    //             $discount = $coupon->calculateDiscount($order->getTotalAmount());
    //             $order->discount_amount = $discount;
    //             $coupon->used_count++;
    //             $coupon->save();
    //         }
    //     }
    //     $order->total_amount = $order->getTotalAmount() - $discount;
    //     $order->save();
    
    //     $orderId = $order->id; // Get the ID of the saved order
    
    //     // Retrieve the cart items from the session
    //     $cart = Session::get('cart', []);

    //     // Save the cart items to the database
    //     foreach ($cart as $cartItem) {
    //         $orderItem = new OrderItem();
    //         $orderItem->order_id = $orderId; // Map the order ID
    //         $orderItem->product_id = $cartItem['product_id'];
    //         $orderItem->product_name = $cartItem['name'];
    //         $orderItem->quantity = $cartItem['quantity'];
    //         $orderItem->price = $cartItem['price'];

    //         $orderItem->save();
    //     }

    //     // Clear the cart in the session
    //     Session::forget('cart');
    //     Session::put('cart_count', 0); // Set the count in the cart session

    //     // Optionally, perform any additional actions or calculations for the order
    //     // ...
    //     return back()->with('success', 'Order placed successfully');
    // }


    public function placeOrder(Request $request)
    {
        $order = new Order();
    
        $order_number = mt_rand(100000, 999999);
        $order->order_number = $order_number;
        $order->name = $request->input('full-name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('tel');
        $order->address = $request->input('address');
        $order->id_user = $request->input('id_user');
    
        // Retrieve the coupon code and apply the discount
        $couponCode = $request->input('coupon-code');
        $discount = 0;
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
            if ($coupon && $coupon->isValid()) {
                $discount = $coupon->calculateDiscount($order->getTotalAmount());
                $order->discount_amount = $discount;
                $coupon->used_count++;
                $coupon->save();
            }
        }
        $order->total_amount = $order->getTotalAmount() - $discount;
        $order->save();
    
        $orderId = $order->id; // Get the ID of the saved order
    
        // Retrieve the cart items from the session
        $cart = Session::get('cart', []);
    
        // Save the cart items to the database
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $orderId; // Map the order ID
            $orderItem->product_id = $cartItem['product_id'];
            $orderItem->product_name = $cartItem['name'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->price = $cartItem['price'];
    
            $orderItem->save();
        }
    
        // Clear the cart in the session
        Session::forget('cart');
        Session::put('cart_count', 0); // Set the count in the cart session
    
        // Send the order email
        $this->sendOrderEmail($order);
    
        return back()->with('success', 'Order placed successfully');
    }
    
   private function sendOrderEmail(Order $order)
{
    $orderItems = $order->orderItems;
    $orderId = $order->id; // Get the ID of the saved order
    $orderItem= DB::table('order_items')
    ->where('order_id',$orderId)
    ->get();

    $emailContent = '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Order Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f5f5f5;
            }
            .header {
                background-color: #D10024;
                color: #fff;
                padding: 20px;
                text-align: center;
            }
            .order-details {
                margin-top: 20px;
            }
            .order-item {
                display: flex;
                justify-content: space-between;
                padding: 10px 0;
                border-bottom: 1px solid #ddd;
            }
            .total-amount {
                text-align: right;
                font-weight: bold;
                margin-top: 20px;
            }
            .discount {
                text-align: right;
                margin-top: 10px;
            }
            .footer {
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Thank you for your order!</h1>
            </div>
            <div class="order-details">
                <p>Order Number: ' . $order->order_number . '</p>
                <p>Customer Name: ' . $order->name . '</p>
                <p>Email: ' . $order->email . '</p>
                <p>Phone Number: ' . $order->phone_number . '</p>
                <p>Address: ' . $order->address . '</p>
            </div>
            <div class="order-items">
                <h2>Order Items:</h2>
                ';
                
                $emailContent .= '
                       <table class="order-table" style="width:100%;border-collapse:collapse;font-family:Arial,sans-serif;">
                            <thead>
                                <tr>
                                <th style="background-color:#f2f2f2;padding:10px;text-align:left;border-bottom:1px solid #ddd;">Product Name</th>
                                <th style="background-color:#f2f2f2;padding:10px;text-align:left;border-bottom:1px solid #ddd;">Quantity</th>
                                <th style="background-color:#f2f2f2;padding:10px;text-align:left;border-bottom:1px solid #ddd;">Total</th>
                                </tr>
                            </thead>        
                            <tbody>
                        ';
                        $total = 0;
                        foreach ($orderItem as $item) {
                            $itemTotal = $item->price * $item->quantity;
                            $emailContent .= '
                                <tr>
                                    <td>' . $item->product_name . '</td>
                                    <td>' . $item->quantity . '</td>
                                    <td>' . number_format($item->price * $item->quantity,  0, ',', '.') . '₫'.'</td>
                                </tr>
                            ';
                            $total += $itemTotal;
                        }

                        $emailContent .= '
                            </tbody>
                          
                        </table>
                        ';
                
                $emailContent .= '
                    </div>
                    <div class="total-amount">
                        Total Amount: ' . number_format($total, 0, ',', '.') . '₫' . '
                    </div>
                ';


    $emailContent .= '
            <div class="footer">
                Thank you for shopping with us!
            </div>
        </div>
    </body>
    </html>
    ';

    try {
        Mail::html($emailContent, function ($message) use ($order) {
            $message->to($order->email)
                    ->subject('Order Confirmation - Order #' . $order->order_number)
                    ->from('no-reply@yourstore.com', 'Laravel Ecommerce');
        });
    } catch (\Exception $e) {
        // Handle the exception
    }
}
    

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
            $count = count($cart); // Calculate the count of products in the cart
            Session::put('cart_count', $count); // Set the count in the cart session

            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Product removed from cart successfully']);
        }

        return response()->json(['status' => 'success', 'message' => 'Continue shopping!']);

    }

    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $product = Product::find($productId);

            if ($product) {
                $cart[$productId]['quantity'] = $quantity;
                $cart[$productId]['total'] = $quantity * $product->Price;
                session(['cart' => $cart]);
                return response()->json(['status' => 'success', 'message' => 'Cart updated successfully']);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'Product not found in cart']);
    }

    public function clearCart()
    {
        session(['cart' => []]);
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }

    public function getCartCount()
    {
        $cart = session('cart', []);

        // Calculate the cart count based on the number of items in the cart array
        $cartCount = count($cart);

        // Return the cart count as a JSON response
        return response()->json(['count' => $cartCount]);
    }

    public function showOrderDetails()
    {
        $result = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->select(
            'orders.id as order_id',
            'orders.order_number',
            'orders.name',
            'orders.email',
            'orders.phone_number',
            'orders.address',
            'orders.created_at',
            DB::raw('SUM(order_items.quantity * order_items.price) as total_price'),
            DB::raw('COUNT(order_items.product_id) as total_products')
        )
        ->groupBy(
            'orders.id',
            'orders.order_number',
            'orders.name',
            'orders.email',
            'orders.phone_number',
            'orders.address',
            'orders.created_at'
        )
        ->paginate(10);
        // Convert the result to a LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator(
            $result->items(), // Get the items for the current page
            $result->total(), // Total number of items
            $result->perPage(), // Items per page
            $result->currentPage(), // Current page
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Additional options if needed
        );
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        return view('admin::order-details', ['result' => $paginator,'name' => $name]);
    }

    public function viewdetail($OrderId)
    {
        $result = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.id', $OrderId)
            ->select(
                'orders.created_at',
                'orders.order_number',
                'orders.name',
                'orders.address',
                'orders.phone_number',
                'order_items.price',
                'order_items.quantity',
                'orders.id as order_id',
                'orders.name',
                'order_items.product_name',
                'products.ThumbImage',
             
            )
            ->groupBy(
                'orders.created_at',
                'orders.order_number',
                'orders.name',
                'orders.address',
                'orders.phone_number',
                'order_items.price',
                'order_items.quantity',
                'orders.id',
                'orders.name',
                'order_items.product_name',
                'products.ThumbImage'
            )
            ->get();
    
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null;
    
        return view('admin::details', ['result' => $result, 'name' => $name]);
    }


    public function viewsdetail($OrderId)
    {
        $result = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.id', $OrderId) // Replace $yourOrderId with the actual ID
        ->select('order_items.product_id','order_items.price','order_items.quantity','orders.id as order_id','orders.name', 'order_items.product_name','products.ThumbImage',
        DB::raw('COUNT(order_items.product_id) as total_products')
        )
        ->groupBy('order_items.product_id','order_items.price','order_items.quantity','orders.id','orders.name','order_items.product_name','products.ThumbImage')
        ->get(); // Specify the number of items per page
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('user::viewodersdetail', ['result' => $result,'name' => $name,'id_user' => $id_user]);
    
    }


    

    public function vieworder(Request $request)
    {
        $Id = $request->input('iduser');

        // $result = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
        // ->join('products', 'order_items.product_id', '=', 'products.id')
        // ->where('orders.id_user', $Id) // Replace $yourOrderId with the actual ID
        // ->select('order_items.price','order_items.quantity','orders.id as order_id','orders.name', 'order_items.product_name','products.ThumbImage')
        // ->groupBy('order_items.price','order_items.quantity','orders.id','orders.name','order_items.product_name','products.ThumbImage')
        // ->get(); // Specify the number of items per page
        // $users = $this->userRepository->getAll();
        // $auth_admin = Auth::guard('admin')->user();
        // $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        // $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        // return view('user::viewoder', ['result' => $result,'name' => $name,'id_user' => $id_user]);
        $result = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->select(
            'orders.id as order_id',
            'orders.order_number',
            'orders.name',
            'orders.email',
            'orders.phone_number',
            'orders.address',
            'orders.created_at',
            DB::raw('SUM(order_items.quantity * order_items.price) as total_price'),
            DB::raw('COUNT(order_items.product_id) as total_products')
        )
        ->groupBy(
            'orders.id',
            'orders.order_number',
            'orders.name',
            'orders.email',
            'orders.phone_number',
            'orders.address',
            'orders.created_at'

        )
        ->where('orders.id_user', $Id)
        ->paginate(10);

        // Convert the result to a LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator(
            $result->items(), // Get the items for the current page
            $result->total(), // Total number of items
            $result->perPage(), // Items per page
            $result->currentPage(), // Current page
            ['path' => LengthAwarePaginator::resolveCurrentPath()] // Additional options if needed
        );

        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('user::viewoder', ['result' => $paginator,'name' => $name,'id_user' => $id_user]);
    }


    public function destroy_order($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    
        $orderItems = OrderItem::where('order_id', $id)->delete();
    
        return redirect()->back()
                         ->with('success', 'Order has been deleted successfully.');
    }
    

    
}
