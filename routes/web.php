<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/loginsubmit', [UserController::class, 'loginauth']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/registersubmit', [UserController::class, 'registerauth']);
Route::get('/logout', [UserController::class, 'loginout']);



Route::resource('/admin/table', TableController::class);
Route::get('/admin/controll', [TableController::class, 'controll']);
Route::get('/admin/device/switchon/{id}', [TableController::class, 'switchon']);
Route::get('/admin/device/switchoff/{id}', [TableController::class, 'switchoff']);
