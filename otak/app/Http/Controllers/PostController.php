<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    // Display a listing of the resource.

    public function index()
    {
        $posts = Post::all(); // Obtiene todos los posts
        if (Auth::user()->role === 'admin') {
            return view('posts.index', compact('posts'));
        }
    
        abort(403, 'Acceso no autorizado.');
        //return view(view: 'posts.index', compact('posts')); // Pasa la variable a la vista
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $categorias = \DB::table('categorias')->get();
        return view('posts.create', compact('categorias'));
    }
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'contenido' => 'required',
        ]);

        $post = new Post();
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->contenido = $request->contenido;
        $post->categoria_id = $request->categoria_id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    // Display the specified resource.
    public function show(int $postId)
{
    $post= Post::find($postId);
    //dd($post);
    $comments = Comment::where('post_id', $post->id)->with('user')->latest()->paginate(5);
    return view('posts.show', compact('post', 'comments'));
}
    // Show the form for editing the specified resource.
    public function edit(int $postId)
    {
        $post= Post::find($postId);
        return view('posts.edit', compact('post'));
    }
    public function index_90()
    {
        $posts = Post::where('categoria_id', '1')->get();
        $category = 'series';
        return view('posts.index_category', compact('posts', 'category'));
    }
    public function index_00()
    {
        $posts = Post::where('categoria_id', '2')->get();
        $category = 'peliculas';
        return view('posts.index_category', compact('posts', 'category'));
    }
    public function index_terror()
    {
        $posts = Post::where('categoria_id', '4')->get();
        $category = 'peliculas';
        return view('posts.index_category', compact('posts', 'category'));
    }
    public function index_2010()
    {
        $posts = Post::where('categoria_id', '3')->get();
        $category = 'anime';
        return view('posts.index_category', compact('posts', 'category'));
    }

    public function get_post_username($post_id)
    {
        $post = Post::find($post_id);
        if ($post) {
            $user = User::find($post->user_id);
            return $user ? $user->name : null;
        }
        return null;
    }
}
