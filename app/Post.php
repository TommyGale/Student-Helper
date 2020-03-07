<?php

namespace App;

use Auth;
use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	use Likable;
	
    protected $guarded = [];

     protected $dispatchesEvents = [
      
      'created' => PostCreated::class ];


    public function user()
      {
         return $this->belongsTo(User::class);
      }

      public function comments(){
       
       return $this->hasMany(Comment::class);
   }
   
   public function addComment($comment){
       
       $this->comments()->create($comment);
       
   }

   public function postIsLiked(){

    return $this->likes()->where('user_id', auth()->id())->exists();

}

  public function path()
  {
    return "/posts/{$this->channel->slug}/{$this->id}";
  }

  public function channel() {

    return $this->belongsTo(Channel::class);
  }

   // public function getRouteKeyName()
   // {
   // 	return 'title';
   // }
}
