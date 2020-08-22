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
    
}
