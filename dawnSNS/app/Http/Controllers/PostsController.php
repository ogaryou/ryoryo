<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Follow;
class PostsController extends Controller
{
    //
    public function index(){
        $username = auth()->user();
        // $username = \DB::table('users');
       
        $posts = Post::latest()->get();
        return view('posts.post',['username' => $username,'posts'=>$posts]);

        // return view('posts.index',compact('username'));
        // return view('auth.added',['username' => $username],compact('username'));
    }
    public function create(Request $request){
        $posts = $request->input('newPost');
        Post::create([
            'posts' => $posts,
            'user_id' => auth()->id(),
        ]);
        $posts = Post::all();
        return redirect('/top');

    }
    
}
