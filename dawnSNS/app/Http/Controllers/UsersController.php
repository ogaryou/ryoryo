<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    //
    
    public function profile(){
        $username = auth()->user();
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        return view('users.profile',['username'=> $username,'count'=>$count,'counts'=>$counts]);
    }
    public function search(Request $request){
        $username = Auth::user();
        $user_id = Auth::id();
        $keyword = $request->input('use');
        
        if(!empty($keyword)){
            $user = DB::table('users')->where('username', 'like', '%'.$keyword.'%')->get();
        }else{
            $user = DB::table('users')->get();
        }
        //追加↓
        // $called = app()->make('App\Http\Controllers\Controller');
        // $count_following = $called->counts();
        
        // $count_followings= DB::table('follow_user')->count();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        return view('users.search',['username'=> $username,'user' => $user,'keyword' => $keyword,'count' => $count,'counts'=>$counts]);
    }


    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings();
        $data = [
            'username' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);
        

        

        return view('users.search', $data);
        
    }

    public function followers($id)
    {
        $user = User::find($id);

        $data = [
            'username' => $user,
        ];

        $data += $this->counts($user);

        return view('users.search', $data);
    }


    
}
