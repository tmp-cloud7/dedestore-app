<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;

class Usercontroller extends Controller
{
    // Registration of New User

    function register(Request $request){
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->username = $request->input('username');
        $user->user_role = $request->input('user_role');
        $user->password = Hash::make($request->input('password'));
        $user->user_picture = $request->file('user_picture')->store('user_dp');
        $user->save();
        return $user;
       
    }
}
