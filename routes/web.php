<?php
use App\Http\Controllers\RoleController;
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

Route::get('role-index', [RoleController::class,'index'])->name('role.index');
Route::get('role-create', [RoleController::class,'create'])->name('role.create');
Route::get('role-store', [RoleController::class,'store'])->name('role.store');
Route::get('role-edit/{id}', [RoleController::class,'edit'])->name('role.edit');
Route::get('role-update/{id}', [RoleController::class,'update'])->name('role.update');
Route::get('role-delete/{id}', [RoleController::class,'destroy'])->name('role.delete');

