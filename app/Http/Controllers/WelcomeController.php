<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Direktur;
use App\Models\Kontak;
use App\Models\Prodi;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   public function index() {

        $articles = Article::limit(5)->latest()->get();
        $prodis = Prodi::get();
        $directur= Direktur::first();
        $kontak = Kontak::first();
        return view("frontend.welcome",["articles"=> $articles,"prodis"=>$prodis,"directur"=>$directur,"kontak"=>$kontak]);
   }
}