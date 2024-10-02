@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/uploaded_images/' . $prodi->thumbnail) }}" alt="Thumbnail Image" class="img-thumbnail" style="width: auto; height: auto; border-radius: 0;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/uploaded_images/' . $prodi->logo) }}" alt="Logo Image" class="img-thumbnail" style="width: auto; height: auto; border-radius: 0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">{{ $prodi->nama_prodi }}</p>
                            <p class="font-weight-500">{{ $prodi->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info" style="margin-right: 7px;">
                    <a href="{{ route('prodi.index') }}" style="text-decoration: none; color: white;">
                        Back to Tables
                    </a>
                </button>
                <button class="btn btn-warning" style="margin-right: 7px;">
                    <a href="{{ route('prodi.edit', [Crypt::encrypt($prodi->id)]) }}" style="text-decoration: none; color: white;">
                        Edit
                    </a>
                </button>
                <form class="inline" action="{{ route('prodi.destroy', [Crypt::encrypt($prodi->id)]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        Delete
                    </button>
                </form>
            </div>
@endsection
