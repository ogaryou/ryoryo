<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable =['follow_id','follwer_id'];
    //
    public function users()
    {
        return $this->belongsToMany('App\User', 'follow_user','follow_id', 'id' );
    }
}
