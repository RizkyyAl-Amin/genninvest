@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/articles_images/' . $data->image) }}" alt="Thumbnail Image" class="img-thumbnail" style="width: 10rem; height: 10rem; border-radius: 0;">
                </div>
            </div>
            <div class="row">
                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">{{ $data->title }}</p>
                            <p class="font-weight-500">{{ $data->paragraf_1 }}</p>
                            <p class="font-weight-500">{{ $data->paragraf_2 }}</p>
                            <p class="font-weight-500">{{ $data->paragraf_3 }}</p>
                            <p class="font-weight-500">{{ $data->paragraf_4 }}</p>
                            <p style="font-size: small; color: grey;">Penulis : {{ $data->writer }}</p>
                            <p style="font-size: small; color: grey;">{{$data->created_at}} | {{$data->created_at->diffForHumans()}}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info" style="margin-right: 7px;">
                    <a href="{{ route('article.index') }}" style="text-decoration: none; color: white;">
                        Back to Tables
                    </a>
                </button>
                <button class="btn btn-warning" style="margin-right: 7px;">
                    <a href="{{ route('article.edit', [Crypt::encrypt($data->id)]) }}" style="text-decoration: none; color: white;">
                        Edit
                    </a>
                </button>
                <form class="inline" action="{{ route('article.destroy', [Crypt::encrypt($data->id)]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data dengan title {{$data->title}}?')">
                        Delete
                    </button>
                </form>
            </div>
@endsection
