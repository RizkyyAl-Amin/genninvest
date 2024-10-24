<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KontakController;


use App\Http\Controllers\Admin\KategoriArticleController;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Frontend\ProdiController as FrontendProdiController;
use App\Models\Article;
use App\Models\KategoriArticle;

Route::controller(FrontendController::class)->group(function(){
    Route::get("/","home")->name("home");
    Route::get("/article","article")->name("article");
    Route::get("/article/{title}","readArticle")->name("readArticle");
    Route::resource('/studi', FrontendProdiController::class);

});


Auth::routes();

// role 1 = admin, role 2 = user
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/user', UserController::class);
    Route::resource('/kategoriArticle', KategoriArticleController::class);
    Route::resource('/be/article', ArticleController::class);
    Route::resource('/kontak', KontakController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/user', UserController::class);

});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    // pmb
});
