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

         return view('posts.posts', compact('posts'));
    }

    
    public function create()
    {
        return view ('posts.create');
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($post)
    {
        $post = Post::where('id', $post)->firstOrFail();

         return view ('posts.show', compact('post'));

    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
