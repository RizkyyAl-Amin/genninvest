<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// role 1 = admin, role 2 = user
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/kerjasama', KerjasamaController::class);

});
