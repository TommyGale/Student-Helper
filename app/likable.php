<?php

namespace App;

trait Likable {
    
    
    public function like($user = null)
   {
       $user = $user ?: auth()->user();
       
       return $this->likes()->attach($user);
   }
   
   public function likes()
   {
       return $this->morphToMany(User::class, 'likable')->withTimestamps();
   }

   public function postIsLiked(){

    return $this->likes()->where('user_id', auth()->id())->exists();

}

public function commentIsLiked(){

    return $this->likes()->where('user_id', auth()->id())->count();

}

   public function getLikeCountAttribute() {

    return $this->likes->count();
  }

}


?>