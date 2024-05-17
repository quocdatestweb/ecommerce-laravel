<?php

namespace datnguyen\user\Http\Controllers;
use datnguyen\user\Repositories\UserRepository;
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
class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function login()
    {

        return view('user::login');
    }


    public function register()
    {

        return view('user::register');
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


    // public function authenticate(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->passes()) {
    //         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
    //             $admin = Auth::guard('admin')->user();
    //             if ($admin && $admin->role == 1) {
    //                 return redirect()->route('admin.index');
    //             } else {
    //                 Auth::guard('admin')->logout();
    //                 return redirect()->route('user.login')->with('error', 'You are not authorized to access the admin panel.');
    //             }
    //         } else {
    //             return redirect()->route('user.login')->with('error', 'Either email or password is incorrect.');
    //         }
    //     } else {
    //         return redirect()->route('user.login')->withErrors($validator)->withInput($request->only('email'));
    //     }
    // }


   // Controller code

   public function authenticate(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required',
       ]);

       if ($validator->passes()) {
           if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
               $admin = Auth::guard('admin')->user();
               if ($admin->hasVerifiedEmail() && $admin->role == 1) {
                   return redirect()->route('admin.index');
               } elseif (!$admin->hasVerifiedEmail()) {
                   return redirect()->route('user.login')->with('error', 'Please verify your email address.');

               } else {
                   Auth::guard('admin')->logout();
                   return redirect()->route('user.login')->with('error', 'You are not authorized to access the admin panel.');
               }
           } else {
               return redirect()->route('user.login')->with('error', 'Either email or password is incorrect.');
            }
       } else {
           return redirect()->route('user.login')
               ->withErrors($validator)
               ->withInput($request->only('email'));
       }
    }

    public function logoutPost(): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('user.login');
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
}
