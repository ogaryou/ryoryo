<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['posts','user_id','username'];
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function follow()
    {
        return $this->belongsTo(Follow::class);
    }
    public function getpost(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->where('user_id', $user_id)->where('follow_id',$follow_ids)->orderBy('created_at', 'DESC');
    }
}
