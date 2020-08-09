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
    public function followings($id)
    {
        $user = User::find($id);

        $data = [
            'username' => $user,
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
