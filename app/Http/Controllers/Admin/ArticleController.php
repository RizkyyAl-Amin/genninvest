<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {

        $search = $request->input('search');

        // Cek apakah ada input pencarian
        if ($search) {
            // Lakukan pencarian berdasarkan title yang mengandung teks pencarian
            $articles = Article::where('title', 'like', '%' . $search . '%')->latest()->paginate(5);
        } else {
            // Jika tidak ada pencarian, tampilkan semua artikel
            $articles = Article::latest()->paginate(5);
        }

        // Kirim data artikel ke view
        return view('admin.article.index', ["datas"=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("admin.article.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "title"=> "min:6|max:100|required",
            "writer"=> "required",
            "paragraf_1"=> "min:10|required",
            "paragraf_2"=> "min:10|required",
            "paragraf_3"=> "min:10|required",
            "paragraf_4"=> "min:10|required",
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('img/articles_images'), $filename);
            $data["image"] = $filename;
        }
        Article::create($data);
        return redirect()->route("article.index")->with('success', 'Article berhasil diupload dan disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("admin.article.show",["data"=>Article::findOrFail(Crypt::decrypt($id))]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        return view("admin.article.edit",["data" => Article::find(Crypt::decrypt($id))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail(Crypt::decrypt($id));
        $data = $request->validate([
           'image' => 'required|file|mimes:jpg,png,pdf|max:2048',
            "title"=> "min:6|max:100|required",
            "writer"=> "required",
            "paragraf_1"=> "min:10|required",
            "paragraf_2"=> "min:10|required",
            "paragraf_3"=> "min:10|required",
            "paragraf_4"=> "min:10|required",
        ]);
        if ($request->hasFile('image')) {
            $path = "img/articles_images/" . $article->image;
            if ($article->image && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/articles_images'), $filename);

            $article->image = $filename;
            $article->title = $data['title'];
            $article->writer = $data['writer'];
            $article->paragraf_1 = $data['paragraf_1'];
            $article->paragraf_2 = $data['paragraf_2'];
            $article->paragraf_3 = $data['paragraf_3'];
            $article->paragraf_4 = $data['paragraf_4'];
            $article->writer = $data['writer'];
            $article->save();

            return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Article::findOrFail(Crypt::decrypt($id));
        if ($user->image) {
            $imagePath = public_path('img/articles_images/' . $user->image);

            // Hapus file gambar jika ada
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $user->delete();

        return redirect()->route('article.index')->with('success', 'Data Prodi berhasil dihapus!');
    }
}
