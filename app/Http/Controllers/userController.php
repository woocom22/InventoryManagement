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
        return view('page.auth.registration');
    }
    function loginForm()
    {
        return view('page.auth.login');
    }
    function sendCode()
    {
        return view('page.auth.otpCode');
    }
    function verifyOTPPage(){
        return view('page.auth.otpCodeSubmit');
    }

    function resetPasswordPage()
    {
        return view('page.auth.resetPassword');
    }

    function userDashboard()
    {
        return view('page.dashboard.dashboard');
    }

    function profilePage()
    {
        return view('page.dashboard.profile');
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

function userLogin(Request $request)
{
    $count=User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->select('id')->first();

    if($count !==null){
        // User Login-> JWT Token Issue
        $token=JWTToken::CreateToken($request->input('email'),$count->id);
        return response()->json([
            'status' => 'success',
            'message' => 'User Login Successful',
        ],200)->cookie('token', $token,60*24*30);
    }
    else{
        return response()->json([
            'status' => 'failed',
            'message' => 'unauthorized'
        ],200);

    }
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
        ]);
    }
}


function verifyOTP(Request $request){
    $email=$request->input('email');
    $otp=$request->input('otp');
    $count=User::where('email', '=',$email)
        ->where('otp','=',$otp)
        ->count();

    if($count==1){
        // Update OTP into database
        User::where('email', '=',$email)->update(['otp'=>'0']);
        // issue new token for reset password
        $token=JWTToken::createTokenForPasswordReset($request->input('email'));

        return response()->json([
            'status' => 'success',
            'message' => 'OTP Verified Successfully',
            'token' =>$token
        ],200)->cookie('token', $token,60*24*30);
    }else{
        return response()->json([
            'status' => 'failed',
            'message' => 'Please enter valid OTP or Email address'
        ],200);
    }
}


function resetPassword(Request $request){
    try {
        $email=$request->header('email');
        $password=$request->input('password');
        User::where('email', '=', $email)->update(['password'=>$password]);
        return response()->json([
            'status' => 'success',
            'message' => 'Password Reset Successful'
        ],200);
    } catch (Exception $exception){
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized'
        ],200);
    }
}

function userLogout()
{
    return redirect('/user-login')->cookie('token', '', -1);
}


    function UserProfile(Request $request){
        $email=$request->header('email');
        $user=User::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);
    }

    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            User::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }


}
















