<?php

namespace App;

use App\Filters\PostFilters;
use Auth;
use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	use Likable;
  use RecordsDashboard;
	
    protected $guarded = [];

    protected $with = ['user' , 'channel'];

     protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('commentCount', function ($builder) {
            $builder->withCount('comments');
        });

        static::deleting(function ($post) {

          $post->comments()->delete();
          $post->likes()->delete();
        });

    }

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


  public function path()
  {
    return "/posts/{$this->channel->slug}/{$this->id}";
  }

  public function channel() {

    return $this->belongsTo(Channel::class);
  }

  public function scopeFilter($query, $filters) 
  {

    return $filters->apply($query);
  }

   // public function getRouteKeyName()
   // {
   // 	return 'title';
   // }
}
