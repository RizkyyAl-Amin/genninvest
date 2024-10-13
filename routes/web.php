<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DirekturController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

use App\Models\Article;

Route::get('/', [WelcomeController::class,"index"]);



Route::get('/article', function () {
    return view('frontend.informasi.artikel');
});




Auth::routes();

// role 1 = admin, role 2 = user
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/article', ArticleController::class);
    Route::resource('/berita', BeritaController::class);
    Route::resource('/direktur', DirekturController::class);
    Route::resource('/kerjasama', KerjasamaController::class);
    Route::resource('/kontak', KontakController::class);
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/user', UserController::class);
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    // pmb
});
