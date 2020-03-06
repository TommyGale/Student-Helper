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

     public function update(Comment $comment , Post $post)
    {
        $comment->update($this->validData());

        return redirect('/posts/' . $comment->post->id);
    }
    
    
 public function store(Post $post) {

 		$attributes = $this->validData();
        
        $attributes['user_id'] = auth()->id();
     
        $post->addComment($attributes);
                   
        return redirect('/posts/' .$post->id);
    }

    public function edit(Post $post, Comment $comment)
    {

    	if($comment->user_id !== auth()->id()){
            
          return redirect()->back();
        }

        return view ('comments.edit', compact('comment')); 
    }
    
    public function destroy(Post $post, Comment $comment)
    {
      $comment->delete();

      return redirect('/posts/' . $comment->post->id);
    }
     protected function validData() {
        
        return request()->validate([
         'description' => ['required', 'min:4','max:50']
        ]);
        
    }

}
