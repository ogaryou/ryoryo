<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    //
    public function index(){
        $username = \Auth::user();
        // $username = \DB::table('users');
        return view('layouts.login',['username' => $username]);
        return view('posts.index',compact('username'));
        // return view('auth.added',['username' => $username],compact('username'));

    }

}
