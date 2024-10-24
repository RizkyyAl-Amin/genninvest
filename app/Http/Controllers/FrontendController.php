<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Direktur;
use App\Models\Kontak;
use App\Models\Kunjungan;
use App\Models\Prodi;
use App\Models\Berita;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
     public function home()
     {

          $articles = Article::limit(3)->latest()->get();
          $kontak = Kontak::first();
          return view("frontend.welcome", compact("articles","kontak"));
     }
     public function article()
     {
         
          $kontak = Kontak::first();

          // content
          $articles = Article::latest()->paginate(3);
          
          return view("frontend.informasi.artikel", compact("kontak", "articles"));
     }
     public function readArticle($title)
     {
          
          $kontak = Kontak::first();
          $article = Article::where("title", $title)->first();
         
          if ($article) {
               return view("frontend.informasi.readArtikel", compact("kontak", "article"));
          }
     }
}
