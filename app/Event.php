<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Event extends Model
{
    protected $guarded = [];
    
    use Joinable;

    public function user()
      {
         return $this->belongsTo(User::class);
      }
}
