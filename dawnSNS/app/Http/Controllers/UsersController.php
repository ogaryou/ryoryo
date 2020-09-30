<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    //
    

    public function profile($id){
        $username = auth()->user();
        $user_id = Auth::id();
        $count= DB::table('follow_user')->where('user_id',$user_id)->count();
        $counts=DB::table('follow_user')->where('follow_id',$user_id)->count();

        $user =DB::table('users')->where('id', $id)->first();
        return view('users.profile',['username'=> $username,'images'=>$username,'count'=>$count,'counts'=>$counts],compact('user'));
    }
    public function update(Request $request){
        $user = User::find(auth()->id());

        $request->validate ( [
            'username' => ['min:4','max:12'],
            'mail' => ['min:4','max:12','unique:users,mail,'. $user ->mail .',mail'],
            'newpassword' => ['sometimes','nullable','min:4','max:12','unique:users,password,'. $user ->password.',password','regex:/^[0-9a-zA-Z]*$/','different:password'],
            'bio' =>['nullable','string','max:200']
        ]);
        
        if(Hash::check($request->input('newpassword'), $user->password)){
            return back();

        }elseif(empty($request->input('newpassword'))){
                $user->password;
                $user->save();
        }else{
            $request->user()->fill([
                'password' => Hash::make($request->input('newpassword'))
            ])->save();
        }

        
        $id =$request->input('id');
        
        $up_username = $request->input('username');
        $up_mail =$request->input('mail');
        
    


        $up_images=$request->file('images');
        $up_Bio=$request->input('bio');
        // if (!empty($request->input('newpassword'))) {
        //     $user->password = Hash::make($request->password);
        //     $user->save();
        // }
    



            \DB::table('users')->where('id',$id)->update(['username'=>$up_username,'mail'=>$up_mail,'bio'=>$up_Bio,'images'=>$up_images]);
            
 
            // \DB::table('users')->where('id',$id)->update(['username'=>$up_username,'mail'=>$up_mail,'password'=>$up_newpassword,'bio'=>$up_Bio,'images'=>$up_images]);
        
  
    
        
  
       
        $this->validate($request, [
            'images' =>[
                'file',
                'image',
                'mimes:jpeg,png,jpg,bmp,gif,svg',
            ]
        ]);
        if($request->file('images')){
           
            $filename =$request->file('images')->store('public/');
            $user = User::find(auth()->id());
            $user->images =basename($filename);
            $user->save();
            
            
        }
        return redirect('/top');

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
        return view('users.search',['username'=> $username,'user' => $user,'keyword' => $keyword,'count' => $count,'counts'=>$counts,'images'=>$username]);
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
