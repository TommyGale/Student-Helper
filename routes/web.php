<?php

use Illuminate\Http\Request;

Route::resource('posts' , 'PostsController');

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::put('/comments/{comment}', 'CommentsController@update');

Route::get('/posts/{post}/comments/{comment}/edit', 'CommentsController@edit');

Route::delete('/comments/{comment}', 'CommentsController@destroy');

Route::post('/posts/{post}/like' , 'LikeController@postLiked');

Route::delete('/posts/{post}/unlike', 'LikeController@postUnliked');

Route::post('/comments/{comment}/like' , 'LikeController@commentLiked');

Route::delete('/comments/{comment}/unlike', 'LikeController@commentUnliked');





Auth::routes();
