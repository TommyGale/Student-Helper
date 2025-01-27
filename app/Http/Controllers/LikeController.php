<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Channel;


class LikeController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
   
public function postLiked($channel, Post $post){

		$post->like();

		return back();

}


public function postUnliked($channel, Post $post){

		$user = auth()->user()->id;

		$post->likes()->wherePivot('user_id' , '=', $user)->detach();

		return back();

}

public function commentLiked(Comment $comment){

		$comment->like();

		return back();

}


public function commentUnliked(Comment $comment){

		$user = auth()->user()->id;

		$comment->likes()->wherePivot('user_id' , '=', $user)->detach();

		return back();

}


}
