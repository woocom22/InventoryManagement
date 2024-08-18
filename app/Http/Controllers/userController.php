<?php

namespace App\Http\Controllers;

use App\helper\JWTToken;
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
function userLogin(Request $request)
{
    $count=User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->count();

    if($count==1){
        // User Login-> JWT Token Issue
        $token=JWTToken::CreateToken($request->input('email'));
        return response()->json([
            'status' => 'success',
            'message' => 'User Login Successful',
            'token' =>$token
        ],200);
    }
    else{
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ],200);

    }
}





}
