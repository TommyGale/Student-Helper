	<?php

use Illuminate\Http\Request;



Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/' , 'HomeController@index');

Route::get('/chats' , 'ChatsController@index');

Route::get('/message/{id}' , 'ChatsController@show')->name('message');

Route::post('message' , 'ChatsController@create');

//Route::resource('posts' , 'PostsController');

Route::get('posts' , 'PostsController@index');

Route::get('/posts/create' , 'PostsController@create');

Route::get('/posts/{channel}/{post}' , 'PostsController@show');

Route::delete('/posts/{channel}/{post}', 'PostsController@destroy');

Route::post('posts' , 'PostsController@store');

Route::get('/posts/{channel}/{post}/edit', 'PostsController@edit');

Route::put('/posts/{channel}/{post}', 'PostsController@update');

Route::get('/posts/{channel}' , 'PostsController@index');





Route::post('/posts/{channel}/{post}/comments' , 'CommentsController@store');

//Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::put('/comments/{comment}', 'CommentsController@update');

Route::get('/posts/{post}/comments/{comment}/edit', 'CommentsController@edit');

Route::delete('/comments/{comment}', 'CommentsController@destroy');


Route::post('/posts/{post}/like' , 'LikeController@postLiked');

Route::delete('/posts/{post}/unlike', 'LikeController@postUnliked');

Route::post('/comments/{comment}/like' , 'LikeController@commentLiked');

Route::delete('/comments/{comment}/unlike', 'LikeController@commentUnliked');

Route::get('/profiles/{user}' , 'ProfilesController@show')->name('profile');





Auth::routes();
