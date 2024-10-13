<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\FrontendController;
>>>>>>> 85b9a26c7ee0ec62969b1f7e0935237bd636159e
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


Route::controller(FrontendController::class)->group(function(){
    Route::get("/","home")->name("home");
    Route::get("/article","article")->name("article");
    Route::get("/article/{title}","readArticle")->name("readArticle");
    Route::get("/sambutan","sambutan")->name("sambutan");
});






Auth::routes();

// role 1 = admin, role 2 = user
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
<<<<<<< HEAD
    Route::resource('/article', ArticleController::class);
    Route::resource('/berita', BeritaController::class);
=======
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/kerjasama', KerjasamaController::class);
    Route::resource('/berita', BeritaController::class);
    Route::resource('/be/article', ArticleController::class);
    Route::resource('/kontak', KontakController::class);
>>>>>>> 85b9a26c7ee0ec62969b1f7e0935237bd636159e
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
