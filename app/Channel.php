<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function getRouteKeyName() {

    	return 'slug';
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
