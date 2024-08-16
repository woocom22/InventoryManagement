<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user-registration-form', [userController::class, 'registrationForm'])->name('form.Registration');
Route::post('/user-registration', [userController::class, 'registrationFormPost'])->name('form.Registration.Post');
