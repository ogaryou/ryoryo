<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    //
    
    public function profile(){
        $username = Auth::user();
        return view('users.profile',['username'=> $username]);
    }
    public function search(Request $request){
        $username = Auth::user();
        $keyword = $request->input('use');
        
        if(!empty($keyword)){
            $user = DB::table('users')->where('username', 'like', '%'.$keyword.'%')->get();
        }else{
            $user = DB::table('users')->get();
        }
        return view('users.search',['username'=> $username,'user' => $user,'keyword' => $keyword]);
    }
    public function follow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
             $follower->follow($user->id);
        }
        return back();
    }
    public function unfollow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            $follower->unfollow($user->id);
        }

        return back();
    }
}
