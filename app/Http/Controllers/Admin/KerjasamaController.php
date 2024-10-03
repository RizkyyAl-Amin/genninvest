<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Kerjasama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class KerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kerja-sama.index', [
            'kerjasamas' => Kerjasama::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kerja-sama.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $thumbnailFileName = time() . '_header.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('img/uploaded_images/'), $thumbnailFileName);
            $validatedData['thumbnail'] = $thumbnailFileName;
        }
    
        // Tambahkan tanggal saat ini
        $validatedData['tanggal'] = Carbon::now()->setTimezone('Asia/Jakarta');
    
        Kerjasama::create($validatedData);
    
        return redirect()->route('kerjasama.index')->with('success', 'Artikel Kerja Sama Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kerjasama = Kerjasama::findOrFail($id); 
    
        return view('admin.kerja-sama.show', [
            'kerjasama' => $kerjasama
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $kerjasama = Kerjasama::findOrFail($id);

        return view('admin.kerja-sama.edit', compact('kerjasama'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $kerjasama = Kerjasama::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Batasan ukuran 2MB
        ]);
    
        // Fungsi untuk menyimpan file dan menghapus yang lama
        function handleFileUpload($request, $kerjasama, $fieldName, $directory)
        {
            if ($request->hasFile($fieldName)) {
                // Hapus file lama jika ada
                if ($kerjasama->$fieldName) {
                    $oldFilePath = public_path($directory . '/' . $kerjasama->$fieldName);
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }
    
                // Simpan file baru
                $fileName = time() . uniqid() . '.' . $request->$fieldName->extension();
                $request->$fieldName->move(public_path($directory), $fileName);
                return $fileName;
            }
            return $kerjasama->$fieldName; // Gunakan file lama jika tidak ada file baru
        }
    
        // Proses thumbnail
        $validatedData['thumbnail'] = handleFileUpload($request, $kerjasama, 'thumbnail', 'img/uploaded_images');
    
        // Tambahkan tanggal saat ini
        $validatedData['tanggal'] = Carbon::now()->setTimezone('Asia/Jakarta');
    
        // Update model kerjasama dengan data yang divalidasi
        $kerjasama->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('kerjasama.index')->with('success', 'Artikel kerja sama berhasil diperbarui!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $kerjasama = Kerjasama::findOrFail($id);
    
        if ($kerjasama->thumbnail) {
            $thumbnailPath = public_path('img/uploaded_photo/' . $kerjasama->thumbnail);
            
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }
        }
    
        $kerjasama->delete();
    
        return redirect()->route('kerjasama.index')->with('success', 'Artikel kerja sama berhasil dihapus!');
    }
}
