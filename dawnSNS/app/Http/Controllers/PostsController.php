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
        $follow = DB::table('follow_user')->where('user_id',$user_id)->pluck('follow_id');
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        // $posts=DB::table('posts')->whereIn('user_id',$follow)->where('user_id',$user_id)->orderBy('id', 'desc')->get();
        // $posts= Post::with(['follow'])->where('user_id',$user_id)->orderBy('id', 'desc')->get();
        $posts = Post::whereIn('user_id',$follow)->orwhere('user_id',$user_id)->orderBy('created_at', 'desc')->get();
        
        return view('posts.post',['username' => $username,'posts'=>$posts,'count'=>$count,'counts'=>$counts,'images'=>$user_id]);
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
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        $follow = DB::table('follow_user')->where('user_id',$user_id)->pluck('follow_id');
        $following = User::whereIn('id',$follow)->orwhere('images',$user_id)->orderBy('created_at', 'desc')->get();
        $posts = Post::whereIn('user_id',$follow)->orderBy('created_at', 'desc')->get();
        return view('follows.followList',['username' => $username,'count'=>$count,'counts'=>$counts,'following'=>$following,'posts' =>$posts]);
    }
    public function follows($id){
        $username = auth()->user();
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        $user = User::find($id);
        $users = Post::whereIn('user_id',$user)->orderBy('created_at', 'desc')->get();
 
        return view('follows.followingpage',['username' => $username,'count'=>$count,'counts'=>$counts,'users'=>$users,'user'=>$user]);
    }
    public function followerlist(){
        $username = auth()->user();
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        $follower=DB::table('follow_user')->where('follow_id',$user_id)->pluck('user_id');
        $followerlist =User::whereIn('id',$follower)->orwhere('images',$user_id)->orderBy('created_at', 'desc')->get();
        $posts = Post::whereIn('user_id',$follower)->orderBy('created_at', 'desc')->get();
        return view('follows.followerList',['username' => $username,'count'=>$count,'counts'=>$counts,'followerlist'=>$followerlist,'posts' =>$posts]);
    }
    public function followers($id){
        $username = auth()->user();
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();
        $user = User::find($id);
        $users = Post::whereIn('user_id',$user)->orderBy('created_at', 'desc')->get();
        return view('follows.followerpage',['username' => $username,'count'=>$count,'counts'=>$counts,'users'=>$users,'user'=>$user]);
    }
    
}
