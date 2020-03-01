<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index()
    {
        $posts = Post::all();

         return view('posts.index', compact('posts'));
    }

    
    public function create()
    {
        return view ('posts.create');
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(Post $post)
    {
        $post = Post::where('id', $post)->firstOrFail();

         return view ('posts.show', compact('post'));

    }

   
    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
