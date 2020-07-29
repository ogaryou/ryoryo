<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    //
    
    public function profile(){
        $username = Auth::user();
        return view('users.profile',['username'=> $username]);
    }
    public function search(){
        return view('users.search');
    }
}
