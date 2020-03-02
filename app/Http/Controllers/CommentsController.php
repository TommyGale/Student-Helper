<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
    
    public function update(Comment $comment) 
    {
           $comment->update($this->validData());

        return redirect('/posts/' . $post->id);
    }

 public function store(Post $post) {

 		$attributes = $this->validData();
        
        $attributes['user_id'] = auth()->id();
     
        $post->addComment($attributes);
                   
        return redirect('/posts/' .$post->id);
    }

    public function edit(Comment $comment)
    {

    if($comment->user_id !== auth()->id()){
            
          return redirect()->back();
        }
        
       return view ('comments.edit', compact('comment')); 
    }
    
    
    protected function validData() {
        
        return request()->validate([
         'description' => ['required', 'min:4','max:50']
        ]);
        
    }
    

}
