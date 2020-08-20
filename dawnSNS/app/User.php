<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
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

    public function followings()
    {
        return $this->belongsToMany(User::class,  'follow_user','user_id', 'follow_id' )->withTimestamps();
        
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'follow_id', 'user_id')->withTimestamps();
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function follow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;

        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }
    public function unfollow($userId)
    {
        $existing = $this->is_following($userId);
        $myself = $this->id == $userId;

        if ($existing && !$myself){
            $this->followings()->detach($userId);
        }
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
        
    


}
