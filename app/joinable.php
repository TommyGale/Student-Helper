<?php

namespace App;

trait joinable {
    
    
    public function join($user = null)
   {
       $user = $user ?: auth()->user();
       
       return $this->joins()->attach($user);
   }
   
   public function joins()
   {
       return $this->morphToMany(User::class, 'joinable')->withTimestamps();
   }

   public function eventIsJoined(){

    return $this->joins()->where('user_id', auth()->id())->exists();

}

public function peopleIsJoined(){

    return $this->joins()->where('user_id', auth()->id())->count();

}

   public function getJoinCountAttribute() {

    return $this->joins->count();
  }

}


?>