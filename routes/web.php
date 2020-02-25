<?php

use Illuminate\Http\Request;

Route::resource('posts', 'ForumsController');

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/posts', function () {
    return view('posts.posts');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
