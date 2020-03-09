<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	use Likable;
	
    protected $guarded = [];

    protected $with = ['user' , 'likes'];
    
    public function post(){
        
        return $this->belongsTo(Post::class);
    }
    
    public function user()
      {
         return $this->belongsTo(User::class);
      }


}

