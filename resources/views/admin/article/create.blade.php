@extends('admin.layouts.main')

@section('title', 'Data Article')
@section("css")
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section("content")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row align-items-center">
                <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                        <h3 class="font-weight-bold">Tambah Data Article</h3>
                </div>
                <form action="{{ route('article.store') }}" method="POST" style="width: 100%;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul">
                            @error('title')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="form-group col-md-6">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="writer" value="admin" class="form-control" id="penulis"
                                placeholder="Penulis">
                            @error('writer')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="paragraf_1">Paragraf 1</label>
                        <textarea rows="5" name="paragraf_1" cols="30" type="text" class="form-control" id="paragraf_1"
                            placeholder="Paragraf 1"></textarea>
                        @error('paragraf_1')
                            <p class="mt-2 text-sm text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paragraf_2">Paragraf 2</label>
                        <textarea rows="5" name="paragraf_2" cols="30" type="text" class="form-control" id="paragraf_2"
                            placeholder="Paragraf 2"></textarea>
                        @error('paragraf_2')
                            <p class="mt-2 text-sm text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paragraf_1">Paragraf 3</label>
                        <textarea rows="5" name="paragraf_3" cols="30" type="text" class="form-control" id="paragraf_1"
                            placeholder="Paragraf 3"></textarea>
                        @error('paragraf_3')
                            <p class="mt-2 text-sm text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paragraf_4">Paragraf 1</label>
                        <textarea rows="5" name="paragraf_4" cols="30" type="text" class="form-control" id="paragraf_4"
                            placeholder="Paragraf 4"></textarea>
                        @error('paragraf_4')
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
            <div class="form-group">
                <label for="konten">Teks Content</label>
                <textarea class="form-control summernote" id="konten" name="text_content" rows="4" placeholder="Isi konten Article"></textarea>
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
