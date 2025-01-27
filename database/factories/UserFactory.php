<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\Comment;
use App\Channel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avatar' => 'https://via.placeholder.com/150',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];

    });

$factory->define(Post::class, function (Faker $faker){

	return [
		'user_id' => function () {
			return factory('App\User')->create()->id;
		},
		'channel_id' => function () {
			return factory('App\Channel')->create()->id;
		},
		'title' => $faker->sentence,
		'description' => $faker->paragraph
	];
});

$factory->define(Channel::class, function (Faker $faker){

	$name = $faker->word;

	return [
		'name' => $name,
		'slug'	=> $name
	];
});

$factory->define(Comment::class, function (Faker $faker){

	return [
		'post_id' => function () {
			return factory('App\Post')->create()->id;
		},
		'user_id' => function () {
			return factory('App\User')->create()->id;
		},
		'description' => $faker->paragraph
	];
});
