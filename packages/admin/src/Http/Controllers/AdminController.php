<?php

namespace datnguyen\admin\Http\Controllers;
use datnguyen\user\Repositories\UserRepository;
use datnguyen\post\Repositories\PostRepository;
use datnguyen\post\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use datnguyen\product\Models\Product;
use datnguyen\post\Models\Post;
use datnguyen\user\Models\Prize;
use datnguyen\user\Models\Gift;

class AdminController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository,UserRepository $userRepository)
    {
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->userRepository = $userRepository;

    }


    public function index()
    {
        $products = Product::with('category')->paginate(5);
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        return view('admin::index', ['products' => $products,'users' => $users,'name'=>$name]);
    }

    public function add()
    {  $products = Product::with('category')->paginate(5);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        return view('admin::add',['products' => $products,'users' => $users,'name'=>$name]);
    }

    public function addpost()
    {  $products = Product::with('category')->paginate(5);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        return view('admin::add_post',['products' => $products,'users' => $users,'name'=>$name]);
    }

    public function listpost()
    {   $posts = Post::paginate(5);
        $categorys =  $this->postCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $randomNumber = rand(1000, 9999);
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        // Return the posts view with the retrieved posts
        return view('admin::listpost', ['posts' => $posts, 'randomNumber' => $randomNumber,'posts' => $posts,'categorys' => $categorys,'users' => $users,'name'=>$name]);
    }


    public function getPrize()
    {
            $prizer = Prize::paginate(5);
            $auth_admin = Auth::guard('admin')->user();
            $name = $auth_admin ? $auth_admin->name : null; // Perform null check
            // Return the posts view with the retrieved posts
            return view('admin::gift', ['name'=>$name,'prizer'=>$prizer]);

    
    }

    
    public function getAllWinner()
    {
        $winners = Gift::orderBy('gifts.created_at', 'desc')
                        ->paginate(10);
    
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null;
    
        return view('admin::winner', [
            'name' => $name,
            'winners' => $winners
        ]);
    }
}
