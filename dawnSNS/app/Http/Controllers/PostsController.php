<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PostsController extends Controller
{
    //
    public function index(){
        $username = Auth::user();
        // $username = \DB::table('users');
       
        return view('posts.post',['username' => $username,]);

       
        // return view('posts.index',compact('username'));
        // return view('auth.added',['username' => $username],compact('username'));

    }

}
