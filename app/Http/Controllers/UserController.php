<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup(Request $request){
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request[''],
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
}
