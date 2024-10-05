<?php

use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\KerjasamaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\HomeController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('frontend.welcome',["articles"=> Article::latest()->limit(5)->get()]);
});



Route::get('/article', function () {
    return view('frontend.informasi.artikel');
});




Auth::routes();

// role 1 = admin, role 2 = user
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/kerjasama', KerjasamaController::class);
    Route::resource('/berita', BeritaController::class);
    Route::resource('/be/article', ArticleController::class);
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    // pmb
});
