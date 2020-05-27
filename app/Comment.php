<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	use Likable;
  use RecordsDashboard;
	
    protected $guarded = [];

    protected $with = ['user' , 'likes'];

    protected static function boot()
    {
        parent::boot();

       // static::deleting(function ($comment) {

        //  $comment->delete();
       //   $likes->delete();
      //  });
    }
    
    public function post(){
        
        return $this->belongsTo(Post::class);
    }
    
    public function user()
      {
         return $this->belongsTo(User::class);
      }


}

