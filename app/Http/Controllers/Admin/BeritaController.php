<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin.berita.index', [
            'beritas' => Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriBerita::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2084',
            'judul' => 'required|min:3|max:500',
            'kategori_id' => 'required|exists:kategori_beritas,id', // Validasi kategori_id
            'konten' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Mendapatkan nama user yang sedang login
        $validatedData['user_id'] = Auth::user()->id; 

        // Proses upload cover jika ada
        if ($request->hasFile('cover')) {
            $heroFileName = time() . '_hero.' . $request->cover->extension();
            $request->cover->move(public_path('img/cover-berita/'), $heroFileName);
            $validatedData['cover'] = $heroFileName;
        }

        Berita::create($validatedData);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil ditambahkan!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        // Dekripsi ID untuk keamanan
        $id = Crypt::decrypt($encryptedId);

        // Ambil berita dan data kategoris untuk dropdown
        $berita = Berita::findOrFail($id);
        $kategoris = KategoriBerita::all();

        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID berita
        $id = Crypt::decrypt($encryptedId);
        $berita = Berita::findOrFail($id);

        // Validasi data yang diperbarui
        $validatedData = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2084',
            'judul' => 'required|min:3|max:500',
            'user' => 'required', // Validasi user
            'kategori_id' => 'required|exists:kategori_beritas,id', // Validasi kategori_id
            'konten' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Proses update file cover
        if ($request->hasFile('cover')) {
            // Hapus file cover lama jika ada
            if ($berita->cover) {
                $oldFilePath = public_path('img/cover-berita/' . $berita->cover);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Upload file cover baru
            $newFileName = time() . '_hero.' . $request->cover->extension();
            $request->cover->move(public_path('img/cover-berita/'), $newFileName);
            $validatedData['cover'] = $newFileName;
        } else {
            // Jika tidak ada cover baru, tetap gunakan cover lama
            $validatedData['cover'] = $berita->cover;
        }

        // Update data berita
        $berita->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $berita = Berita::findOrFail($id);

        // Hapus cover jika ada
        if ($berita->cover) {
            $coverPath = public_path('img/cover-berita/' . $berita->cover);
            if (File::exists($coverPath)) {
                File::delete($coverPath);
            }
        }

        // Hapus berita dari database
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
