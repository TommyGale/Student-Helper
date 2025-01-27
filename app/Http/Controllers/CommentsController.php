<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

     public function update(Comment $comment)
    {
        $comment->update($this->validData());

        return redirect('/posts');
    }
    
    
 public function store($channelID, Post $post) {

 		$attributes = $this->validData();
        
        $attributes['user_id'] = auth()->id();
     
        $post->addComment($attributes);
                   
        return back();
    }

    public function edit(Comment $comment)
    {

    	if($comment->user_id !== auth()->id()){
            
          return redirect()->back();
        }

        return view ('comments.edit', compact('comment')); 
    }
    
    public function destroy(Comment $comment)
    {
      $comment->delete();

      return redirect('/posts');
      
          }
     protected function validData() {
        
        return request()->validate([
         'description' => ['required', 'min:4','max:50']
        ]);
        
    }

}
