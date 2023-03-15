<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;


Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

