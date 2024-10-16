@section('css')
<style>
    .custom-img-article {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .article-meta {
        font-size: 14px;
        color: #6c757d;
    }

    .article-header {
        text-align: left;
        margin-bottom: 1rem;
        font-weight: bold;
        color: #333;
    }

    .article-body {
        text-align: justify;
        font-size: 16px;
        line-height: 1.6;
    }

    .share-buttons {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .share-buttons p {
        margin-right: 10px;
    }

    @media (min-width: 770px) {
        .article-header {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section("content")
<section id="berita" class="berita d-flex justify-content-center gap-3 p-3" style="margin-top: 6rem">
    <div class="container">
        <div class="row g-2 align-items-center">
            <!-- Header Judul -->
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="article-header">
                    {{ $berita->judul }}
                </h1>
            </div>

            <div class="col-lg-12 article-meta">
                <i class="fa fa-user"></i> {{ $berita->user->name }} &nbsp;|&nbsp;
                <i class="fa fa-clock"></i> {{ date('l, d F Y - H:i:s', strtotime($berita->tanggal)) }}
            </div>
            <div class="col-lg-12 share-buttons d-flex align-items-center">
                <p>Bagikan:</p>
                <a class="btn btn-success"
                    href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . url()->current()) }}"
                    target="_blank">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>
            <!-- Gambar Berita -->
            <div class="col-lg-12 text-center mb-4">
                <img src="{{ asset('img/cover-berita/' . $berita->cover) }}" alt="{{ $berita->judul }}" >
                <div class="col-lg-12 article-meta">
                    <i class="fa fa-info"></i> {{ $berita->kategori->nama }} &nbsp;|&nbsp;
                    <i ></i> {{ $berita->kategori->slug }}
                </div>
            </div>

            

            <!-- Informasi Author dan Tanggal -->
           

            <!-- Konten Berita -->
            <div class="col-lg-12 article-body mt-4">
                {!! $berita->konten !!}
            </div>

            <!-- Tombol Share -->
            
        </div>
    </div>
</section>
@endsection

@include('frontend.layouts.main')
