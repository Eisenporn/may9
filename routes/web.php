<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;


Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function(){
    Route::post('/signup', 'signup')->name('signup');
    Route::post('/signin', 'signin')->name('signin');

    Route::get('/signup', function() {
        return view('signup');
    })->name('signup.form');
    Route::get('/signin', function() {
        return view('signin');
    })->name('signin.form');


    Route::get('/logout', 'logout')->name('logout');
    // Route::get('/logout', 'logout')->name('logout');
});
