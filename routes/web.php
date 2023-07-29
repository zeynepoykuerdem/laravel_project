<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use  App\Http\Controllers\CustomForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/welcome', function () {
    return view('welcome');
   //return 'hello world';
   //return['foo'=> 'bar'];
});
Route:: get('post',function(){
    return view('post',[
          'post'=>'<h1> Hello </h1> '//$post 
    ]);
});
Route:: get('register ',[RegisterController:: class,'create']);*/

Route::get('login',[CustomAuthController::class,'index'])->name('login');
Route::post('p-login',[CustomAuthController::class,'postLogin'])->name('login.post');
Route::get('registration',[CustomAuthController::class,'registration'])->name('register');
Route::post('p-registration',[CustomAuthController::class,'postRegistration'])->name('register.post');
Route::get('dashboard',[CustomAuthController::class,'dashboard']);
Route::get('logout',[CustomAuthController::class,'logout'])->name('logout');

Route::get('users', [UserController::class, 'index'])-> name('user');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [CustomForgotPasswordController::class, 'forgotPassword'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [CustomForgotPasswordController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.update');