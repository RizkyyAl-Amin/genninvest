<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KunjunganController extends Controller
{
    public function index()
    {

        $kunjungans = Kunjungan::latest()->get();
        return view('admin.kunjungan.index', [
            'kunjungans' => $kunjungans
        ]);
    }

    public function create()
    {
        return view('admin.kunjungan.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        // pengecekan kondisi image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kunjungan'), $filename);
            $data["image"] = $filename;
        }

        Kunjungan::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'image' => $data['image']
        ]);
        return redirect()->route('kunjungans.index')->with('success', 'Data berhasil diupload dan disimpan!');
    }

    public function show(string $id)
    {
        // Mengambil data kunjungan berdasarkan id
        $kunjungan = Kunjungan::find(Crypt::decrypt($id));
        return view('admin.kunjungan.show', [
            'kunjungan' => $kunjungan,
        ]);
    }

    public function edit(string $id)
    {
        // Temukan data kunjungan berdasarkan ID yang telah di-decrypt
        $kunjungan = Kunjungan::find(Crypt::decrypt($id));
        return view('admin.kunjungan.edit', [
            'kunjungan' => $kunjungan
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'file|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Temukan data kunjungan berdasarkan ID yang telah di-decrypt
        $kunjungan = Kunjungan::find(Crypt::decrypt($id));
        $oldImage = $kunjungan->image;

        // Inisialisasi array untuk menampung data yang akan diupdate
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ];

        // Jika gambar baru di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($oldImage && file_exists(public_path('img/kunjungan/' . $oldImage))) {
                unlink(public_path('img/kunjungan/' . $oldImage));
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kunjungan'), $filename);

            // Tambahkan path gambar baru ke dalam array data
            $data['image'] = $filename;
        }

        // Perbarui data kunjungan dengan array $data
        $kunjungan->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kunjungans.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $kunjungan = Kunjungan::findOrFail(Crypt::decrypt($id));

        if ($kunjungan->image) {
            $imagePath = public_path('img/kunjungan/' . $kunjungan->image);

            // Hapus file gambar jika ada
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $kunjungan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!',
        ]);
    }

}
