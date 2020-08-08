<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];
    protected $rememberTokenName = false;

    public function follows()
    {
        return $this->belongsToMany('App\Follow', 'follow_user','id', 'follow_id' );
    }

    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }
    public function isFollowing($user_id) 
    {
        return $this->follows()->where('follow_id', $user_id)->exists();
    }
    public function isFollowed($user_id)
    {
        return $this->followers()->where('follower_id', $user_id);
    }
}

