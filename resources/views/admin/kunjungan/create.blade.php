@extends('admin.layouts.main')
@section('title', 'Data Kunjunan')
@section('css')
    <style>
        .custom-swal-height {
            height: 350px;
            max-height: 80vh;
        }
    </style>
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
                        <h4 class="card-title">Data Kunjungan</h4>
                        <form action="{{ route('kunjungans.store')}}" method="POST" style="width: 100%;" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title" value="">
                                    @error('title')
                                        <p class="mt-2 text-sm text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_id">Writer</label>
                                    <input type="text" name="user_id" value="{{ Auth::user()->name}}" class="form-control" id="user_id" readonly>
                                    @error('user_id')
                                        <p class="mt-2 text-sm text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="4"
                                    placeholder="Content..."></textarea>
                                @error('text_content')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                        <p class="mt-2 text-sm text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                            <a href="{{ route('kunjungans.index') }}" class="btn btn-warning btn-sm">Kembali</a>
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
            $('#content').summernote({
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
