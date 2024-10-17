<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Prodi;
use App\Models\Kontak;
use App\Models\Article;
use App\Models\Direktur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(5);
        $prodis = Prodi::get();
        $directur = Direktur::first();
        $kontak = Kontak::first();
        return view("frontend.program-studi.index", compact("articles", "prodis", "kontak", "directur"));
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
        $prodi = Prodi::findOrFail($id); 
        $articles = Article::paginate(5);
        $prodis = Prodi::get();
        $directur = Direktur::first();
        $kontak = Kontak::first();
        return view("frontend.program-studi.show", compact("prodi", "articles", "prodis", "kontak", "directur"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
