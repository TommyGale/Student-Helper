<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	use Likable;
	
    protected $guarded = [];
    
    public function post(){
        
        return $this->belongsTo(Post::class);
    }
    
    public function user()
      {
         return $this->belongsTo(User::class);
      }

    public function like($user = null)
   {
       $user = $user ?: auth()->user();
       
       return $this->likes()->attach($user);
   }

   public function likes()
   {
       return $this->morphToMany(User::class, 'likable')->withTimestamps();
   }

   public function commentIsLiked(){

    return $this->likes()->where('user_id', auth()->id())->exists();

}
}

