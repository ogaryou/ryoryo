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
        $user_id = Auth::id();
        $follows = Follow::all();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        // $posts=DB::table('posts')->join('follow_user','posts.user_id','=','follow_user.follow_id')->get();
        $posts= Post::with(['follow'])->where('user_id',$user_id)->orderBy('id', 'desc')->get();
        // $posts = Post::where('user_id',$user_id)->with('follow_user.follow_id',$follows)->orderBy('id', 'desc')->get();
        return view('posts.post',['username' => $username,'posts'=>$posts,'count'=>$count,'counts'=>$counts]);

        // return view('posts.index',compact('username'));
        // return view('auth.added',['username' => $username],compact('username'));
    }
    public function create(Request $request){
        $posts = $request->input('newPost');
        Post::create([
            'posts' => $posts,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/top');

    }
    public function followlist(){
        $username = auth()->user();
        return view('follows.followList',['username' => $username]);
    }
    
}
