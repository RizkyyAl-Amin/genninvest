<?php

namespace App\Http\Controllers\Admin;

use App\Models\Direktur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DirekturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.direktur.index', [
            'direktur' => Direktur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.direktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'nullable',
            'sambutan' => 'nullable',
        ]);
        
        Direktur::create($validatedData);
    
        return redirect()->route('direktur.index')->with('success', 'Smabutan Direktur Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $direktur = Direktur::findOrFail($id); 
    
        return view('admin.direktur.show', [
            'direktur' => $direktur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $direktur = Direktur::findOrFail($id);

        return view('admin.direktur.edit', compact('direktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $direktur = Direktur::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'nullable|string',
            'sambutan' => 'nullable|string',
        ]);

        // Update model direktur dengan data yang divalidasi
        $direktur->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('direktur.index')->with('success', 'Sambutan Direktur berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        
        $direktur = Direktur::findOrFail($id);
        $direktur->delete();
    
        return redirect()->route('direktur.index')->with('success', 'Sambutan Direktur berhasil dihapus!');
    }
}
