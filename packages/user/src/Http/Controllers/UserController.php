<?php

namespace datnguyen\user\Http\Controllers;
use datnguyen\product\Repositories\ProductRepository;
use datnguyen\product\Repositories\ProductCategoryRepository;
use datnguyen\product\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Str;
use datnguyen\user\Models\User;
use Illuminate\Support\Facades\Session;
use datnguyen\product\Models\Product;
use datnguyen\user\Models\Gift;
use datnguyen\user\Models\Prize;
use Carbon\Carbon;

class UserController extends Controller
{
    protected $productRepository;
    protected $productCategoryRepository;
    protected $userRepository;

    public function __construct(ProductRepository $productRepository,ProductCategoryRepository $productCategoryRepository,UserRepository $userRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->userRepository = $userRepository;

    }

    public function login()
    {
        $auth_admin = Auth::guard('admin')->user();
        $role = $auth_admin ? $auth_admin->role : null; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $error ='';
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check


        // If authentication fails, redirect back with errors
        return view('user::login', ['role' => $role,'err' =>   $error,'name' =>   $name,'id_user' =>   $id_user  ]);
    }


    public function register()
    {
        $auth_admin = Auth::guard('admin')->user();
        $role = $auth_admin ? $auth_admin->role : null; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('user::register', ['role' => $role,'name' => $name,'id_user' =>   $id_user  ]);

    }

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 1,
            'password' => Hash::make($request->password),
            'confirmation_token' =>  Str::random(10),
        ]);

        // Gửi email xác nhận
        // Gọi phương thức sendConfirmationEmail() (định nghĩa trong UserController) để gửi email xác nhận
        $this->sendConfirmationEmail($user);

        return redirect()->route('user.login')->with('success', 'Registration successful. Please check your email for confirmation.');
    }

    public function sendConfirmationEmail(User $user)
    {
        $data = [
            'user' => $user,
        ];

        // Mail::send('user::confirmation', $data, function ($message) use ($user) {
        //     $message->subject('Xác nhận tài khoản')->to($user->email);
        // });

        try {
            Mail::send('user::confirmation', $data, function ($message) use ($user) {
              $message->subject('Xác nhận tài khoản')->to($user->email);
              $message->from('quocdatforwork@gmail.com', 'Laravel Ecommerce');
            });
          } catch (\Exception $e) {
            // Handle email sending error (log it or notify someone)
            report($e);
          }
    }

    public function confirmEmail($token)
    {
        $user = User::where('confirmation_token', $token)->first();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Invalid confirmation token.');
        }

        $user->confirmation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('user.login')->with('success', 'Email confirmed. You can now log in.');
    }

   
public function authenticate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
        $auth_admin = Auth::guard('admin')->user();
        $role = $auth_admin ? $auth_admin->role : null; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $admin = Auth::guard('admin')->user();
            
            if ($admin->hasVerifiedEmail()) {
                if ($admin->role == 0) {
                    return redirect()->route('admin.index');
                } elseif ($admin->role == 1) {
                    return redirect()->route('products.products_user');
                }
            } else {
                $error = 'Please verify your email address.';

                return view('user::login', ['role' => $role,'err' =>   $error ,'id_user'=>$id_user,'name' =>   $name ]);
            }
        } else {
       
            $error = 'Either email or password is incorrect.';
            return view('user::login', ['role' => $role,'err' =>   $error ,'id_user'=>$id_user,'name' =>   $name ]);

        }

        Auth::guard('admin')->logout();
        $error = 'You are not authorized to access the admin panel.';
        return view('user::login', ['role' => $role,'err' =>   $error ,'id_user'=>$id_user,'name' =>   $name]);
}


    public function logoutPost(): RedirectResponse
    {
          // Clear the cart in the session
        Session::forget('cart');
        Session::put('cart_count', 0); // Set the count in the cart session  
        Auth::guard('admin')->logout();
        return redirect()->route('user.login');
    }

   
   
    public function wheel()
    {
        $auth_admin = Auth::guard('admin')->user();
        $role = $auth_admin ? $auth_admin->role : null; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $spins_left = $auth_admin ? $auth_admin->spins_left : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        $error ='';
    
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check

        // If authentication fails, redirect back with errors4id_user
        return view('user::wheel', ['role' => $role,'err' =>   $error,'name' =>   $name  ,'prizes','id_user'=>$id_user,'spins_left'=>$spins_left]);
    }


    
    public function spin(Request $request)
        {
            // Retrieve authenticated user
            $user = Auth::guard('admin')->user();

            // Check if user is authenticated
            if (!$user) {
                return response()->json(['error' => 'User is not authenticated.'], 401);
            }

            // Check if user has spins left
            if ($user->spins_left <= 0) {
                return response()->json(['error' => 'No spins left.'], 403);
            }

            // Perform spin logic
            $user->spins_left--;
            $user->save();

        }

    public function getSpinsLeft()
    {
        $user = Auth::guard('admin')->user();

        if (!$user) {
            return response()->json(['error' => 'User is not authenticated.'], 401);
        }

        // Assuming spins_left is a column in your users table
        return response()->json(['spins_left' => $user->spins_left]);
    }

    // In your controller
    public function saveGift(Request $request)
    {
        // Retrieve the necessary data from the request
        $userId = $request->input('userId');
        $giftText = $request->input('giftText');
        $status = $request->input('status');

        $createdAt = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString();
        $updatedAt = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh')->toDateTimeString();

        // Create a new record in the database
        
        $user = Auth::guard('admin')->user();

        if (!$user) {
            return response()->json(['error' => 'User is not authenticated.'], 401);
        }
        // Create a new gift record
        $gift = new Gift();
        $gift->user_id = $user->id;
        $gift->gift_text = $request->input('giftText');
        $giftText = $request->input('giftText');
        $gift->image_url = $request->input('image_url');
        $gift->created_at = $createdAt;
        $gift->updated_at = $updatedAt;
        
        $gift->save();

         // Retrieve the corresponding prize
        $prize = Prize::where('name', $giftText)->first();

        // Update the prize quantity if found
        if($giftText == "Thêm 2 lượt" ) {
            $gift->status = 'active';
            $gift->save();   

            $user->spins_left += 2;
            $user->save();
        }else if($giftText == "Chúc bạn may mắn lần sau!") {
            $gift->status = 'active';
            $gift->save();   

        }else if($status == "Đã hết") {
            $gift->status = 'unactive';
            $gift->save();   
        }else{
            $prize->quantity--;
            $prize->save();
        
            $gift->status = 'inactive';
            $gift->save();   
        }

        return redirect()->back()->with('success', 'Phần thưởng đã được lưu thành công!');

    }


    public function viewsprize()
    {


        $auth_admin = Auth::guard('admin')->user();
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check
        $result = Gift::join('users', 'gifts.user_id', '=', 'users.id')
        ->where('users.id', $id_user)
        ->select('gifts.status','gifts.image_url', 'gifts.created_at', 'gifts.gift_text', 'users.name')
        ->orderBy('gifts.created_at', 'desc') // Sort by created_at column in descending order
        ->paginate(10);
    

        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('user::prize',  ['result' => $result,'name' => $name,'id_user' => $id_user]);
    }
}
