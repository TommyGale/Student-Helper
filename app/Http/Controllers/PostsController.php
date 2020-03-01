<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index' , compact('posts'));
    }

    
    public function create()
    {
        return view('posts.create');
    }

   
    public function store(Post $post)
    {

        request()->validate([
            'title' => ['required', 'min:4','max:50'],
        'description' => ['required', 'min:10','max:255']
         ]);

        $post = new Post();

        $post->title = request('title');
        $post->description = request('description');
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts');
    }

    
    public function show(Post $post)
    {

        return view('posts.show' , compact('post'));
    }

   
    public function edit(Post $post)
    {

    
    if($post->user_id !== auth()->id()){
            
          return redirect()->back();
        }
        
       return view ('posts.edit', compact('post')); 
    }

    public function update(Post $post)
    {
        $post->update($this->validData());

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
      $post->delete();

      return redirect('/posts');
    }

    protected function validData() {
    
        
        return request()->validate([
         'title' => ['required', 'min:4','max:50'],
        'description' => ['required', 'min:10','max:255']
        
        ]);
   

    }

    }
