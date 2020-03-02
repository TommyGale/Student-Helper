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

Route::get('/posts/{post}/comments/{comment}/edit', 'CommentsController@edit');

Route::patch('/comments/{comment}', 'CommentsController@update');



Auth::routes();
