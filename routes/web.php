<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\userController;
use App\Http\Middleware\TokenverificationMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Page Route
Route::get('/user-registration', [userController::class, 'registrationForm'])->name('form.Registration');
Route::get('/user-login', [userController::class, 'loginForm'])->name('form.Login');
Route::get('/send-code',[userController::class, 'sendCode'])->name('otp.Code');
Route::get('/verify-otp-page',[userController::class, 'verifyOTPPage'])->name('otp.verifyPage');
Route::get('/reset-page',[userController::class, 'resetPasswordPage'])->middleware([TokenverificationMiddleware::class]);
Route::get('/dashboard', [userController::class, 'userDashboard'])->middleware([TokenverificationMiddleware::class]);
Route::get('/userProfilePage', [userController::class, 'profilePage'])->middleware([TokenverificationMiddleware::class]);
Route::get('/categoryPage', [categoryController::class, 'categporyPage'])->middleware([TokenverificationMiddleware::class]);



// User Logout
Route::get('/user-logout', [userController::class, 'userLogout']);

// Post Route
Route::post('/user-registration-form', [userController::class, 'registrationFormPost'])->name('form.Registration.Post');
Route::post('/user-login', [userController::class, 'userLogin']);
Route::post('/sendOTP', [userController::class, 'SentOTPCode']);
Route::post('/verify-otp', [userController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/reset-password', [userController::class, 'resetPassword'])->middleware([TokenverificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


// Category API
Route::post('/create-category',[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/category-list',[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-category',[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-category',[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);



