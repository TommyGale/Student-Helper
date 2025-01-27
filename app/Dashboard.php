<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
   protected $guarded = [];



       public function subject()
    {
        return $this->morphTo();
    }

    public static function feed($user , $take = 25) {

    	return static::where('user_id' , $user->id)->latest()->with('subject')->take($take)->get()->groupBy(function ($dashboard) {

    		return $dashboard->created_at->format('Y-m-d');
    	});
    }
}
