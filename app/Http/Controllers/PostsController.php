<?php

namespace App\Http\Controllers;


use App\Channel;
use App\Filters\PostFilters;
use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    
    public function index(Channel $channel , PostFilters $filters)
    {

        $posts = $this->getPosts($channel, $filters);

        return view('posts.index' , compact('posts'));
    }

    
    public function create()
    {
        return view('posts.create');
    }

   
    public function store(Post $post)
    {
        
        auth()->user()->posts()->create($attributes= $this->validData());


        return redirect('/posts');
    }

    
    public function show($channel , Post $post)
    {

        return view('posts.show' , [ 'post' => $post,
                                     'comments' => $post->comments()->paginate(10)]);
    }

   
    public function edit($channel, Post $post)
    {

    if($post->user_id !== auth()->id()){
            
          return redirect()->back();
        }
        
       return view ('posts.edit', compact('post')); 
    }

    public function update($channel,Post $post)
    {
         $post->update($this->validData());

        return redirect('/posts');
    }

    public function destroy($channel,Post $post)
    {
      //$post->comments()->delete();
      //$post->likes()->delete();
      $post->delete();

      return redirect('/posts');
    }



    protected function validData() {

        return request()->validate([
         'title' => ['required', 'min:4','max:50'],
        'description' => ['required', 'min:10','max:255'], 
        'channel_id' => 'required|exists:channels,id'       
        ]);

    }

    public function getPosts(Channel $channel, PostFilters $filters)
{
        $posts = Post::filter($filters); 

        if ($channel->exists) { 
        $posts->where('channel_id', $channel->id); 
        }

        return $posts->latest()->get();
}

    }
