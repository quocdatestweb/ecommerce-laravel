<?php

namespace datnguyen\post\Http\Controllers;
use datnguyen\post\Repositories\PostRepository;
use datnguyen\post\Repositories\PostCategoryRepository;
use datnguyen\post\Repositories\UserRepository;
use Illuminate\Http\Request;
use datnguyen\post\Models\Post;
use datnguyen\post\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        // Retrieve paginated posts using the query builder
        $posts = Post::paginate(10);

        $randomNumber = rand(1000, 9999);

        // Return the posts view with the retrieved posts
        return view('posts::index', ['posts' => $posts, 'randomNumber' => $randomNumber]);

    }

    public function postadmin()
    {
        // Retrieve paginated posts using the query builder
        $posts = Post::paginate(10);
        $categorys =  $this->postCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        $randomNumber = rand(1000, 9999);

        // Return the posts view with the retrieved posts
        return view('posts::post-admin', ['posts' => $posts, 'randomNumber' => $randomNumber,'posts' => $posts,'categorys' => $categorys,'users' => $users]);
    }


    public function create()
    {
        // Return the create post view
        return view('posts::create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        if ($request->file('thumb_image')) {
            $file = $request->file('thumb_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/post'), $filename);
            $post->thumb_image = $filename;
        }
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->content = $request->input('content');
        $post->category_id = $request->input('categoryid');
        $post->author_id = $request->input('author_id');
        $post->author_type = $request->input('author_type');
        $post->save();
        return back()->with('success', 'Post created successfully');


    }

    public function show($id)
    {
        // Find the post by ID
        $post = $this->postRepository->find($id);
        $categorys =  $this->postCategoryRepository->getAll();
        $posts = $this->postRepository->getAll();

        // Return the post details view with the retrieved post
        return view('post::detail', ['post' => $post,'posts' => $posts,'categorys' => $categorys,]);
    }

    public function edit($id)
    {
        // Find the post by ID
        $post = $this->postRepository->find($id);
        $categorys =  $this->postCategoryRepository->getAll();
        $posts = $this->postRepository->getAll();
        $users = $this->userRepository->getAll();

        // Return the edit post view with the retrieved post
        return view('posts::edit', ['post' => $post,'posts' => $posts,'categorys' => $categorys,'users' => $users]);
    }

    public function update(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        if ($request->file('thumbImage')) {
            $file = $request->file('thumbImage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/post'), $filename);
            $post->thumb_image = $filename;
        }
           // Tách author_id thành hai phần
           $authorIdParts = explode('-', $request->input('author_id'));
           if (count($authorIdParts) === 2) {
               $post->author_id = $authorIdParts[0];
               $post->author_type = $authorIdParts[1];
           } else {
               $post->author_id = 0;
               $post->author_type = 0;
           }
        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->save();
        //  // Update the post using the repository
        //  $post = $this->postRepository->update($id, $validatedData);

         // Redirect to the post details page or wherever appropriate
        return redirect()->route('posts.edit', $post->id);
    }

    public function destroy($id)
    {
        // Delete the post using the repository
        $this->postRepository->delete($id);

        // Redirect to the post index page or wherever appropriate
        return redirect()->route('posts.admin');
    }
}
