<?php

namespace App\Http\Controllers;

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
        $data = Video::with('category')->get();
        return view('profile', ['data' => $data]);
    }
}
