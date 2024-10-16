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
        border: none
    }

    /* Large screens (lg), untuk ukuran layar >= 992px */
    @media (min-width: 770px) {
        .custom-img-article {
            height: 10rem;
        }
        .custom-img-direktur {
            height: 25rem;
            width: 100%
        }
        .card-direktur{
        border: #f3f4f6


    }
    }

</style>

    {{-- Jika ingin menambahkan css khusus pada halaman ini, tambahkan di sini. Jangan di main. --}}
@endsection
@section("content")
<section id="artikel" style="margin-top: 10rem" class="artikel d-flex justify-content-center gap-3 p-3">
    <div class="row col-12 col-md-11 col-lg-10">
        <div class="container col-10 col-md-8 col-lg-8" data-aos="fade-up">
            <h2>Kunjungan</h2>
            @foreach ($kunjungans as $kunjungan)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        @if (file_exists(public_path('img/kunjungan/' . $kunjungan->image)) && $kunjungan->image)
                        <img src="{{ asset('img/kunjungan/' . $kunjungan->image) }}" class="img-fluid col-12 rounded-start custom-img-article" alt="...">
                        @else
                            <div style="width: 100%;  background-color: white;" class="img-fluid rounded-start d-flex justify-content-center align-items-center custom-img">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif
                    </div>
                    <div class="col-11 col-md-8 order-0 order-md-1">
                        <div class="card-body">
                            <a href="{{route('readKunjungan', $kunjungan->title)}}" style="text-transform: capitalize; font-weight: bold; font-size:1rem;" class="card-title">{{ $kunjungan->title }}</a>
                            <p style="text-align:left; font-size:0.9rem; margin-top:1.4rem;" class="card-text">{{ Str::words(strip_tags($kunjungan->content), 25, '...') }}</p>
                            <p style="margin-top:0.9rem;" class="card-text"><small class="text-body-secondary">Updated {{ $kunjungan->created_at->diffForHumans() }} - Oleh {{ $kunjungan->user->name }}</small></p>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            {{ $kunjungans->onEachSide(5)->links() }}
        </div>
        <div class="mt-4 mt-md-0 col-12 col-md-4 d-flex justify-content-center">
            <div class="card card-direktur">
                <img style="position: relative; left: 50%; transform: translateX(-50%)" class="card-img-top rounded-0 custom-img-direktur" src="https://plus.unsplash.com/premium_photo-1682125707803-f985bb8d8b6a?q=80&w=1416&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $directur->nama }}</h4>
                    <p class="text-secondary text-center font-weight-light">- Direktur -</p>
                    <p class="card-text">{{ Str::words($directur->sambutan, 20, '...') }}</p>
                    <!-- Pindahkan link selengkapnya di sini, tepat setelah paragraf -->
                    <a href="{{ route('sambutan') }}" class="card-link d-block text-center mt-3">Selengkapnya</a>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection
@include('frontend.layouts.main')
