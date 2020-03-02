<?php

namespace App;

use Auth;
use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

   // public function getRouteKeyName()
   // {
   // 	return 'title';
   // }
}
