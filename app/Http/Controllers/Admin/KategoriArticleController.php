<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class KategoriArticleController extends Controller
{
    
    public function index()
    {
        $kategoris = KategoriArticle::all();
        return view('admin.kategori-article.index', compact('kategoris'));
    }

    
    public function create()
    {
        return view('admin.kategori-article.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'

        ]);

        KategoriArticle::create([
            'nama' => $validated['nama'],
        ]);

        return redirect()->route('kategoriArticle.index')->with('success', 'Kategori Article berhasil ditambahkan');
    }

   
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $kategoriArticle = KategoriArticle::findOrFail($id);
        return view('admin.kategori-article.edit', compact('kategoriArticle'));
    }

    
    public function update(Request $request, $encryptedId)
    {
       
        $id = Crypt::decrypt($encryptedId);
        $kategoriArticle = KategoriArticle::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            
        ]);

        $kategoriArticle->update([
            'nama' => $validated['nama'],
            
        ]);

        return redirect()->route('kategoriArticle.index')->with('success', 'Kategori Article berhasil diperbarui');
    }

 
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $kategoriArticle = KategoriArticle::findOrFail($id);
        $kategoriArticle->delete();
        return redirect()->route('kategoriArticle.index')->with('success', 'Kategori Article berhasil dihapus');
    }
}
