<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;

class Usercontroller extends Controller
{
    // Registration of New User

    function register(Request $request){
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|unique:users,phone|regex:/^0[789][01]\d{8}$/', //* Pregmatch can be done here also this way
            'username' => 'required|string|unique:users,username',
            'user_role' => 'required|in:user,vendor,admin',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\w]{8,}$/',
            'cpassword' => 'required|same:password',
            'user_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:3072'
        ], [
            'firstname.required' => 'Firstname is required.',
            'lastname.required' => 'Lastname is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email address.',
            'email.unique' => 'Email already exist.',
            'phone.required' => 'Phone Number is required.',
            'phone.unique' => 'Phone Number already exist.',
            'phone.regex' => 'Invalid Phone Number Format (eg., 08012345678).',
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists.',
            'user_role.required' => 'User role is required.',
            'user_role.in' => 'Invalid User Role',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit and one special character.',
            'cpassword.required' => 'Confirm Password is required.',
            'cpassword.same' => 'Confirm Password does not match with Password.',

        ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }
        try {
            $user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->username = $request->input('username');
            $user->user_role = $request->input('user_role');
            $user->password = Hash::make($request->input('password'));
            if($request->hasFile('user_picture')) {
                $user->user_picture = $request->file('user_picture')->store('user_dp');
            } else {
                $user->user_picture = 'default_dp.jpg'; // Set a default profile picture if no image is provided.
            }      
            $user->save();
            return response() -> json($user, 201);
        } catch(\Exception $e)  {
            return response()->json(['error' => $e->getMessage()], 500);
        }    
    } 
}
