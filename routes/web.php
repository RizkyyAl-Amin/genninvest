<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('/prodi', ProdiController::class);
