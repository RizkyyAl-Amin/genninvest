<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Support\Facades\Crypt;


class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kontak.index', [
            'kontak' => Kontak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);

        $kontak = Kontak::findOrFail($id);

        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryptedId)
    {
        // Dekripsi ID
        $id = Crypt::decrypt($encryptedId);
        $kontak = Kontak::findOrFail($id);
    
        // Validasi data
        $validatedData = $request->validate([
            'alamat' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'required|string',
            'fb_url' => 'required|string',
            'ig_url' => 'required|string',
            'yt_url' => 'required|string',
        ]);

        // Update model kontak dengan data yang divalidasi
        $kontak->update($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('kontak.index')->with('success', 'Kontak Politeknik berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
