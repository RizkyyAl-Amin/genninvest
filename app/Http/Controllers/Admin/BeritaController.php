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
        $prodi = Berita::findOrFail($id); 
    
        return view('admin.program-studi.show', [
            'prodi' => $prodi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $prodi = Berita::findOrFail($id);

        return view('admin.program-studi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $prodi = Berita::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'nama_prodi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Batasan ukuran 2MB
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Batasan ukuran 2MB
        ]);
    
        // Fungsi untuk menyimpan file dan menghapus yang lama
        function handleFileUpload($request, $prodi, $fieldName, $directory)
        {
            if ($request->hasFile($fieldName)) {
                // Hapus file lama jika ada
                if ($prodi->$fieldName) {
                    $oldFilePath = public_path($directory . '/' . $prodi->$fieldName);
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }
    
                // Simpan file baru
                $fileName = time() . uniqid() . '.' . $request->$fieldName->extension();
                $request->$fieldName->move(public_path($directory), $fileName);
                return $fileName;
            }
            return $prodi->$fieldName; // Gunakan file lama jika tidak ada file baru
        }
    
        // Proses logo dan thumbnail
        $validatedData['logo'] = handleFileUpload($request, $prodi, 'logo', 'img/uploaded_images');
        $validatedData['thumbnail'] = handleFileUpload($request, $prodi, 'thumbnail', 'img/uploaded_images');
    
        // Update model prodi dengan data yang divalidasi
        $prodi->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Informasi Prodi berhasil diperbarui!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $prodi = Berita::findOrFail($id);
    
        if ($prodi->logo) {
            $logoPath = public_path('img/uploaded_photo/' . $prodi->logo);
            
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }
        if ($prodi->thumbnail) {
            $thumbnailPath = public_path('img/uploaded_photo/' . $prodi->thumbnail);
            
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
        }
    
        $prodi->delete();
    
        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil dihapus!');
    }
}
