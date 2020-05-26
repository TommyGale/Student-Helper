<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //put avatar in the fillable filed when implemented
    protected $fillable = [
        'name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id')->latest();
    }

     public function events()
    {
        return $this->hasMany(Event::class, 'user_id')->latest();
    }

     public function comments()
    {
        return $this->hasMany(Comment::class, 'created_by');
    }

    public function getRouteKeyName() {

        return 'name';
    }

    public function dashboard() {

        return $this->hasMany(Dashboard::class);
    }
}
