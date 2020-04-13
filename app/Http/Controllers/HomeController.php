<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\PostFilters;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Post $post,Channel $channel)
    {

    	$posts = Post::latest()->take(3)->get();

        return view('index' , compact('posts'));
    }
}
