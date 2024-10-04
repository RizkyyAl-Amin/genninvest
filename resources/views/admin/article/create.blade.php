@extends("admin.layouts.main")

@section('title', 'Data Article')

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row align-items-center">
                <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                        <h3 class="font-weight-bold">Tambah Data Article</h3>
                </div>
            </div>
        </div>
        <form action="{{route("article.store")}}" method="POST" style="width: 100%;" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="judul">Judul</label>
                <input type="text" name="title" class="form-control" id="judul" placeholder="Judul">
                @error('title')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="konten">Isi Konten</label>
                <textarea rows="5" name="text_article" cols="30" type="text" class="form-control" id="konten" placeholder="Isi Konten"></textarea>
                @error('text_article')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
              </div>
            </div>
            <div class="form-group col-md-4">
                <label for="penulis">Penulis</label>
              <input type="text" name="writer" value="admin" class="form-control" id="penulis" placeholder="Penulis">
              @error('writer')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="image">Gambar</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
              </div>

            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
    </div>
</div>



@endsection
