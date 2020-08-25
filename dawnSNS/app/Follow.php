<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable =['follow_id','follwer_id'];
    //
    public function users()
    {
        return $this->belongsToMany('App\User', 'follow_user','follow_id', 'user_id' );
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFollowCount($user)
    {
        return $this->where('follow_id', $user)->count();
    }
    public function getFollowerCount($user)
    {
        return $this->where('follower_id', $user)->count();
    }
    public function following($user_id)
    {
        return $this->where('follow_id', $user_id)->get('follow_id');
    }

}
