@extends('admin.layouts.main')

@section('title', 'Data Prodi')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">Tambah Data Program Studi</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Data Prodi</h4>
                        <form class="forms-sample"  action="{{ route('prodi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                        <label for="nama_prodi">Nama Program Studi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Nama Program Studi">
                        @error('nama_prodi')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Informasi Program Studi"></textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <label for="logo" class="block text-gray-700">Logo Image</label>
                            <input id="logo" type="file" class="form-control w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="logo" onchange="previewImage('logo', 'preview-logo')">
                            <!-- Container for preview image -->
                            <div id="preview-logo" class="mt-2">
                            <!-- Pratinjau gambar logo akan muncul di sini -->
                            </div>
                            @error('logo')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5 mb-5">
                            <label for="thumbnail" class="block text-gray-700">Thumbnail Image</label>
                            <input id="thumbnail" type="file" class="form-control w-full border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" name="thumbnail" onchange="previewImage('thumbnail', 'preview-thumbnail')">
                            <!-- Container for preview image -->
                            <div id="preview-thumbnail" class="mt-2">
                            <!-- Pratinjau gambar thumbnail akan muncul di sini -->
                            </div>
                            @error('thumbnail')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
