<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class KategoriBeritaController extends Controller
{
    // Menampilkan semua kategori berita
    public function index()
    {
        $kategoris = KategoriBerita::all();
        return view('admin.kategori-berita.index', compact('kategoris'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('admin.kategori-berita.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required',
            'status' => 'required|boolean',
        ]);

        KategoriBerita::create([
            'nama' => $validated['nama'],
            'slug' => Str::slug($validated['slug']),
            'status' => $validated['status'],
        ]);

        return redirect()->route('kategoriBerita.index')->with('success', 'Kategori Berita berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $kategoriBerita = KategoriBerita::findOrFail($id);
        return view('admin.kategori-berita.edit', compact('kategoriBerita'));
    }

    // Memperbarui kategori berita
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required',
            'status' => 'required|boolean',
        ]);

        $kategoriBerita->update([
            'nama' => $validated['nama'],
            'slug' => Str::slug($validated['slug']),
            'status' => $validated['status'],
        ]);

        return redirect()->route('kategoriBerita.index')->with('success', 'Kategori Berita berhasil diperbarui');
    }

    // Menghapus kategori berita
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->delete();
        return redirect()->route('kategoriBerita.index')->with('success', 'Kategori Berita berhasil dihapus');
    }
}
