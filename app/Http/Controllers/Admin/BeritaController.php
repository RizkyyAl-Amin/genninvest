<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

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
        return view('admin.berita.create');
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
            'author' => 'required',
            'konten' => 'required',
            'tanggal' => 'required'
        ]);
        if ($request->hasFile('cover')) {
            $heroFileName = time() . '_hero.' . $request->cover->extension();
            $request->cover->move(public_path('img/cover-berita/'), $heroFileName);
            $validatedData['cover'] = $heroFileName;
        }
        
        Berita::create($validatedData); 
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $berita = Berita::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2084',
            'judul' => 'required|min:3|max:500',
            'author' => 'required',
            'konten' => 'required',
            'tanggal' => 'required'
        ]);
    
        // Fungsi untuk menyimpan file dan menghapus yang lama
        function handleFileUpload($request, $berita, $fieldName, $directory)
        {
            if ($request->hasFile($fieldName)) {
                // Hapus file lama jika ada
                if ($berita->$fieldName) {
                    $oldFilePath = public_path($directory . '/' . $berita->$fieldName);
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }
    
                // Simpan file baru
                $fileName = time() . uniqid() . '.' . $request->$fieldName->extension();
                $request->$fieldName->move(public_path($directory), $fileName);
                return $fileName;
            }
            return $berita->$fieldName; // Gunakan file lama jika tidak ada file baru
        }
    
        // Proses cover
        $validatedData['cover'] = handleFileUpload($request, $berita, 'cover', 'img/cover-berita');
        
    
        // Update model berita dengan data yang divalidasi
        $berita->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $berita = Berita::findOrFail($id);
    
        if ($berita->cover) {
            $coverPath = public_path('img/cover-berita/' . $berita->cover);
            
            if (File::exists($coverPath)) {
                File::delete($coverPath);
            }
        }
    
        $berita->delete();
    
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
