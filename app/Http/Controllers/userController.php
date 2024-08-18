<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class userController extends Controller
{
    function  registrationForm()
    {
        return view('frontend.registration');
    }
    function registrationFormPost(Request $request)
    {
        try {
            User::create([
                'firstName'=>$request->input('firstName'),
                'lastName'=>$request->input('lastName'),
                'email'=>$request->input('email'),
                'mobile'=>$request->input('mobile'),
                'password'=>$request->input('password'),
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Registration Successful'
            ],200);
        } catch (Exception $e){
            return response()->json([
                'status'=>'failed',
                'message'=>'Registration failed'
            ],200);
        }


    }
    function loginForm()
    {
        return view('frontend.login');
    }






}
