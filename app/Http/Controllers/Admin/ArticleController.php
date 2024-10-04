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
    public function index()
    {
        return view("admin.article.index",["datas" => \App\Models\Article::paginate(10)]);
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
            "text_article"=> "min:10|required",
            "writer"=> "required"
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
        //
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
            "text_article"=> "min:10|required",
            "writer"=> "required"
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
            $article->text_article = $data['text_article'];
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
