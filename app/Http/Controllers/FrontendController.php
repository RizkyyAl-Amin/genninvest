<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Direktur;
use App\Models\Kontak;
use App\Models\Prodi;
use App\Models\Berita;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
     public function home()
     {

          $articles = Article::limit(5)->latest()->get();
          $prodis = Prodi::get();
          $directur = Direktur::first();
          $kontak = Kontak::first();
          return view("frontend.welcome", compact("articles", "prodis", "kontak", "directur"));
     }
     public function article()
     {
          $prodis = Prodi::get();
          $kontak = Kontak::first();

          // content
          $articles = Article::latest()->paginate(10);
          $directur = Direktur::first();
          return view("frontend.informasi.artikel", compact("prodis", "kontak", "articles", "directur"));
     }
     public function readArticle($title)
     {
          $prodis = Prodi::get();
          $kontak = Kontak::first();
          $article = Article::where("title", $title)->first();
          $directur = Direktur::first();
          if ($article) {
               return view("frontend.informasi.readArtikel", compact("prodis", "kontak", "article", "directur"));
          }
     }
     public function sambutan()
     {
          $prodis = Prodi::get();
          $kontak = Kontak::first();
          $directur = Direktur::first();
          return view("frontend.sambutan.sambutan", compact("prodis", "kontak", "directur"));
     }

     public function berita()
     {
          $prodis = Prodi::get();
          $kontak = Kontak::first();

          $beritas = Berita::latest()->paginate(10);  
          $directur = Direktur::first();
          return view("frontend.berita.berita", compact("prodis", "kontak", "beritas", "directur"));
     }

     public function halamanBerita($title)
     {
          $prodis = Prodi::get();
          $kontak = Kontak::first();
          $berita = Berita::where("judul", $title)->first();  
          $directur = Direktur::first();
          if ($berita) {
               return view("frontend.berita.halaman-berita", compact("prodis", "kontak", "berita", "directur"));
          }
     }
}
