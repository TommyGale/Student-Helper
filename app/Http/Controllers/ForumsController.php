<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    

    public function __construct() 
    {
    	$this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
    	$posts = Post::all();

    	return view('/posts', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	auth()->user()->posts()->create($attributes = $this->postValid());

    	return redirect('/posts');
    }

    public function show(Post $post)
    {
    	return view ('show' , compact('post'));
    }

    public function edit(Post $post)
    {
    	if(\Gate::denies('update', $post))
    	{
    		return redirect()->back();
    	}

    	if($post->user_id !== auth()->id())
    	{
    		return redirect()->back();
    	}

    	return view ('edit', compact('post'));
    }

 	public function update(Post $post)
    {
        
        
        $post->update($this->postValid());
        
        
        return redirect('/posts');
    }

   
    public function destroy(Post $post)
    {
        
        
       $post->delete();
       
       
       return redirect('/posts');
    }
    
    protected function postValid () {
    
        
        return request()->validate([
         'title' => ['required', 'min:4','max:50'],
        'description' => ['required', 'min:10','max:255']
        
        ]);
   

    }

    
}