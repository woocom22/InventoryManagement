<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-registration', [userController::class, 'registrationForm'])->name('form.Registration');
Route::post('/user-registration-form', [userController::class, 'registrationFormPost'])->name('form.Registration.Post');
Route::get('/user-login', [userController::class, 'loginForm'])->name('form.Login');

