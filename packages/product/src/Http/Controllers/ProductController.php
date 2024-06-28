<?php

namespace datnguyen\product\Http\Controllers;

use datnguyen\product\Repositories\ProductRepository;
use datnguyen\product\Repositories\ProductCategoryRepository;
use datnguyen\product\Repositories\UserRepository;
use Illuminate\Http\Request;
use datnguyen\product\Models\Product;
use datnguyen\product\Models\User;
use datnguyen\product\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
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
    

    public function index()
    {
        $products = Product::with('category')->paginate(16);
        // $categorys =  $this->productCategoryRepository->getAll();
        // View::share('categorys', $categorys);
        $users = $this->userRepository->getAll();
        $id_user = $auth_admin ? $auth_admin->id : null; // Perform null check

        return view('products::products-user', ['products' => $products,'users' => $users,'id_user' => $id_user]);
    }

    public function admin()
    {
        $products = Product::with('category')->paginate(16);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        return view('products::admin', ['products' => $products,'users' => $users,'name'=>$name]);
    }


    public function products_user()
    {
        $products = Product::with('category')->paginate(16);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $products_limit_3 = Product::with('category')->paginate(3);
        // $products_limit_3 = Product::where('CategoryID', 2)->get();

        $product_top_selling = Product::with('category')->paginate(16);
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check
        return view('products::content', ['product_top_selling' => $product_top_selling,'products' => $products,'products_limit_3' => $products_limit_3,'name'=>$name,'id_user' => $id_user]);
    }

    public function products_category(Request $request)
    {
        $category = $request->input('category');
        $categories= $request->input('categories');
        $auth_admin = Auth::guard('admin')->user();
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check

        $products_limit_3 = Product::with('category')->paginate(3);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();

        if($categories != ""){
            $product_top_selling = Product::where('CategoryID', $categories)->get();
        }else{
            $product_top_selling = Product::with('category')->paginate(16);
        }

        if($category != ""){
            $products = Product::where('CategoryID', $category)->get();
        }else{
            $products = Product::with('category')->paginate(16);
        }


        return view('products::content', ['products' => $products,'product_top_selling' => $product_top_selling,'products_limit_3' => $products_limit_3,'users' => $users,'name'=>$name,'id_user' => $id_user]);
    }



    public function search(Request $request)
    {
        $categoryid = $request->input('categoryid');
        $productname = $request->input('productname');
        $auth_admin = Auth::guard('admin')->user();
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check

        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $products_limit_3 = Product::with('category')->paginate(3);
        // $categorys = $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $product_top_selling = Product::with('category')->paginate(16);

        // Example query using Eloquent ORM with OR operator
        $products = Product::where('CategoryID', $categoryid)
            ->orWhere('Name', 'like', '%' . $productname . '%')
            ->get();

        return view('products::search', ['product_top_selling' => $product_top_selling,'products' => $products,'products_limit_3' => $products_limit_3,'users' => $users,'productname'=>$productname,'name'=>$name,'id_user' => $id_user]);
    }


    public function create()
    {
        // Return the create product view
        return view('products.create');
    }


    public function store(Request $request)
    {
        $product = new Product();
        if ($request->file('thumbImage')) {
            $file = $request->file('thumbImage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->thumbImage = $filename;
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->content = $request->input('content');
        $product->categoryid = $request->input('categoryid');
        $product->author_id = $request->input('author_id');
        $product->author_type = $request->input('author_type');
        $product->save();
        return back()->with('success', 'Product created successfully');
    }


    public function show($id)
    {
        // Find the product by ID
        $products = $this->productRepository->find($id);
        // $categorys = $this->productCategoryRepository->getAll();
        $randomId = rand(1, 5);
        $products_limit_4 = Product::with('category')->where('CategoryID', $randomId)->paginate(4);
        $auth_admin = Auth::guard('admin')->user();
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check

        $role = $auth_admin ? $auth_admin->role : null; // Perform null check
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        // Return the product details view with the retrieved product
        return view('products::detail',  compact('products','products_limit_4','role','name','id_user'));
    }


    public function edit($id)
    {
        // Find the product by ID
        $products = Product::with('category')->find($id);
        // $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $auth_admin = Auth::guard('admin')->user();
        $name = $auth_admin ? $auth_admin->name : null; // Perform null check
        $id_user = $auth_admin ? $auth_admin->id : " "; // Perform null check

        // Return the edit product view with the retrieved product
        return view('products::edit',['products' => $products,'users' => $users,'name'=>$name,'id_user' => $id_user]);
    }
 // $categorys =  $this->productCategoryRepository->getAll();

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('productlist')->with('error', 'Product not found.');
        }

        if ($request->file('thumbImage')) {
            $file = $request->file('thumbImage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->thumbImage = $filename;
        }

        // Cập nhật các trường thông tin khác của sản phẩm
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->content = $request->input('content');

        // Tách author_id thành hai phần
        $authorIdParts = explode('-', $request->input('author_id'));
        if (count($authorIdParts) === 2) {
            $product->author_id = $authorIdParts[0];
            $product->author_type = $authorIdParts[1];
        } else {
            $product->author_id = 0;
            $product->author_type = 0;
        }

        $product->categoryid = $request->input('category');
        $product->created_at = $request->input('created_at');
        $product->updated_at = $request->input('created_at');
        $product->save();
        return redirect()->route('products.edit', $product->id);
    }


    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return back()->with('success', 'Product added to cart successfully');
    }


}
