@extends('admin.layouts.main')

@section('title', 'Data Article')
@section('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Article</h4>
                    <form action="{{ route('article.update',Crypt::encrypt($data->id))}}" method="POST" style="width: 100%;" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Judul"
                                    value="{{ old('title', $data->title) }}">
                                @error('title')
                                    <p class="mt-2 text-sm text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_id">Writer</label>
                                <input type="text" name="user_id" readonly value="{{Auth::user()->name}}" class="form-control" id="penulis">
                               
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id">
                                @foreach ($kategori_articles as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $article->kategori_id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="konten">Teks Content</label>
                            <textarea class="form-control summernote" id="konten" name="text_content" rows="4"
                                placeholder="Isi konten Article">{{ old('text_content', $data->text_content) }}</textarea>
                            @error('text_content')
                                <p class="mt-2 text-sm text-red-600">
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
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
