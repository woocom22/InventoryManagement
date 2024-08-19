<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-registration', [userController::class, 'registrationForm'])->name('form.Registration');
Route::post('/user-registration-form', [userController::class, 'registrationFormPost'])->name('form.Registration.Post');
Route::get('/user-login', [userController::class, 'loginForm'])->name('form.Login');
Route::post('/user-dashboard', [userController::class, 'userLogin'])->name('user.dashboard');
Route::get('/send-code',[userController::class, 'sendCode'])->name('otp.Code');
Route::post('/send-otp', [userController::class, 'SentOTPCode'])->name('otp.send');
