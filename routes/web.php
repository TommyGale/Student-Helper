<?php

use Illuminate\Http\Request;

Route::resource('posts' , 'PostsController');

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();
