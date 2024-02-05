<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup(Request $request){
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
            'id_role'=>2,
        ]);
        Auth::login($user);
        return redirect('/');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function signin(Request $request){
        if(Auth::attempt([
            'email'=>$request['email'],
            'password'=>$request['password'],
        ])){
            if(Auth::user()->id_role == 1){
                return redirect('/admin');
            }else{
                return redirect('/');
            }
        }
    }

    public function profile(){
        $data = Video::with('category_vid', 'limit_vid')->where('user', Auth::user()->id)->orWhere([['limit', 1],['limit', 2],['limit', 3]])->paginate(2);
        return view('profile', ['data' => $data,]);
    }
}
