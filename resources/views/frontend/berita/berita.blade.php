@extends('layouts.app')

@section('css')
<style>
    /* Default untuk layar kecil (sm) */
    .custom-img-article {
        height: 20rem;
    }
    .custom-img-direktur {
        height: 30rem;
        width: 80%;
    }
    .card-direktur{
        border: none;
    }

    /* Large screens (lg), untuk ukuran layar >= 992px */
    @media (min-width: 770px) {
        .custom-img-article {
            height: 10rem;
        }
        .custom-img-direktur {
            height: 25rem;
            width: 100%;
        }
        .card-direktur{
            border: #f3f4f6;
        }
    }
</style>
@endsection

@section('content')
<section id="berita" style="margin-top: 10rem" class="berita d-flex justify-content-center gap-3 p-3">
    <div class="row col-12 col-md-11 col-lg-10">
        <div class="container col-10 col-md-8 col-lg-8" data-aos="fade-up">
            <h2>Berita Terbaru</h2>
            @foreach ($beritas as $berita)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        @if (file_exists(public_path('img/cover-berita/' . $berita->cover)) && $berita->cover)
                            <img src="{{ asset('img/cover-berita/' . $berita->cover) }}" class="img-fluid col-12 rounded-start custom-img-article" style="height: 12rem" alt="{{ $berita->judul }}">
                        @else
                            <div style="width: 100%; background-color: white;" class="img-fluid rounded-start d-flex justify-content-center align-items-center custom-img">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif
                    </div>
                    <div class="col-11 col-md-8 order-0 order-md-1">
                        <div class="card-body">
                            <a href="{{ route('halamanBerita', $berita->judul) }}" style="text-transform: capitalize; font-weight: bold; font-size:1rem;" class="card-title">{{ $berita->judul }}</a>
                            <p style="text-align:left; font-size:0.9rem; margin-top:1.4rem;" class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($berita->konten), 30, '...') !!}</p>
                            <p style="margin-top:0.9rem;" class="card-text"><small class="text-body-secondary">Diperbarui {{ $berita->created_at->diffForHumans() }} - oleh {{ $berita->user->name }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 mt-md-0 col-12 col-md-4 d-flex justify-content-center">
            <div class="card card-direktur">
                <img style="position: relative; left: 50%; transform: translateX(-50%)" class="card-img-top rounded-0 custom-img-direktur" src="https://plus.unsplash.com/premium_photo-1682125707803-f985bb8d8b6a?q=80&w=1416&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $directur->nama }}</h4>
                    <p class="text-secondary text-center font-weight-light">- Direktur -</p>
                    <p class="card-text">{{ Str::words($directur->sambutan, 20, '...') }}</p>
                    <a href="{{ route('sambutan') }}" class="card-link d-block text-center mt-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@include('frontend.layouts.main')
