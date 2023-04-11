<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/','welcome')->name('home');
Route::view('/score','score')->name('score');



Route::resource('images',ImgController::class,[
    'names'=>'images',
]);


Route::post('/words/{image}',[WordController::class,"store"])->name('words.store');
Route::patch('/words/{word}',[WordController::class,"update"])->name('words.update');
Route::delete('/words/{word}',[WordController::class,"destroy"])->name('words.destroy');

Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/');
    }

    return view('auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'store'])->name('login.store');

Route::get('/register', function () {
    if (auth()->check()) {
        return redirect('/');
    }

    return view('auth.register');
})->name('register');

Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::post('/logout',[AuthController::class,'destroy'])->name('logout');

Route::view('/game',"game")->name('game');

