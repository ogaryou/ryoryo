<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' =>  'required|string|max:4',
            'mail' => 'required|string|email|max12|min4|exists:users,mail,deleted_at,NULL',
            'password' =>  'required|string|max12|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

        
    public function register(Request $request){
      
        // $request->validate([
        //     'username' => 'required|string|max:4',
        //     'mail' => 'required|string|email|max:12|min:4|exists:users,mail,deleted_at,NULL',
        //     'password' => 'required|string|max:12|confirmed',
        // ]);
    
    if($request->isMethod('post')){

    $data = $request->input();

    $this->create($data);

    return redirect('added');
    }
    
    return view('auth.register');

     }

    public function added(){
        $username = DB::table('users')->latest()->first();
        return view('auth.added',['username'=>$username]);
        
    }
}
