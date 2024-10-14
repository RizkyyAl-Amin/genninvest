@extends('admin.layouts.main')

@section('title', 'Data Kunjungan')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">Update Data Kunjungan</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ route('kunjungan.update', Crypt::encrypt($kunjungan->id)) }}" method="POST"
                    style="width: 100%;" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul"
                                value="{{ old('title', $kunjungan->title) }}">
                            @error('title')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                        <div class="form-group col-md-6">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="writer" value="admin" class="form-control" id="penulis"
                                placeholder="Penulis" value="{{ old('writer', $kunjungan->writer) }}" readonly>
                            @error('writer')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea rows="5" name="content" cols="30" type="text" class="form-control" id="content"
                            placeholder="Konten">{{ old('content', $kunjungan->content) }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                                <p class="mt-2 text-sm text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('kunjungan.index')}}" class="btn btn-info">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
