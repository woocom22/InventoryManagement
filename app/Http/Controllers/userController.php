<?php

namespace App\Http\Controllers;

use App\helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

function sendCode()
{
    return view('frontend.otpCode');
}

function SentOTPCode(Request $request){
    $email=$request->input('email');
    $otp=rand(1000,9999);
    $count=User::where('email','=',$email)->count();

    if($count==1){
        // OTP Email
        Mail::to($email)->send(new OTPMail($otp));
        // OTP Code update into User table
        User::where('email','=',$email)->update(['otp'=>$otp]);
        return response()->json([
            'status' => 'Success',
            'message' => 'a 4 digit OTP has been sent to your email'
        ],200);
    }else{
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ],200);
    }
}



}
