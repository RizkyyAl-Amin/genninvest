@extends('admin.layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row align-items-center mb-2">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        @if (file_exists(public_path('img/kunjungan/' . $kunjungan->image)) && $kunjungan->image)
                            <img style="width: 100%" src="{{ asset('img/kunjungan/' . $kunjungan->image) }}" class="img-fluid rounded-start" alt="...">
                        @else
                            <div style="width: 14rem; height: 14rem; background-color: white;" class="img-fluid rounded-start d-flex justify-content-center align-items-center">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">{{ $kunjungan->title }}</div>
                                <div class="font-weight-500">{!! $kunjungan->content !!}</div>
                                <div style="font-size: small; color: grey;">Penulis : {{ $kunjungan->writer }}</div>
                                <div style="font-size: small; color: grey;">{{$kunjungan->created_at}} | {{$kunjungan->created_at->diffForHumans()}}</div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info" style="margin-right: 7px;">
                    <a href="{{ route('kunjungan.index') }}" style="text-decoration: none; color: white;">
                        Back
                    </a>
                </button>
                <button class="btn btn-warning" style="margin-right: 7px;">
                    <a href="{{ route('kunjungan.edit', [Crypt::encrypt($kunjungan->id)]) }}" style="text-decoration: none; color: white;">
                        Edit
                    </a>
                </button>
                <form class="inline" action="{{ route('kunjungan.destroy', [Crypt::encrypt($kunjungan->id)]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        Delete
                    </button>
                </form>
            </div>
@endsection


