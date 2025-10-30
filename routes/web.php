<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('about', function(){
    return view('about');
})->name('about');

Route::get('contact', function(){
    return view('contact');
})->name('contact');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
