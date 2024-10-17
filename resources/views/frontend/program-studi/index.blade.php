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
        <div class="card mb-3">
            <div class="card-body">
                <h5>Program Studi</h5>
                <p>Program Studi</p> <br><br>
            </div>
            <div style="background-color: #eeeee4; width: max; height: auto;">
                <p style="text-align: end; margin-right: 10px; font-size: smaller; color: #808080;">17/10/2024 - Oleh Administrator - Dirujuk 1990 kali</p>
            </div>
        </div>
        <h5>Komentari Tulisan Ini</h5>
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Lengkap</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="url" class="pb-2">URL</label>
                                    <input type="text" class="form-control" name="subject" id="url" required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="coment" class="pb-2">Komentar</label>
                                    <textarea class="form-control" name="message" rows="3" id="coment" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit" class="btn-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="mb-5" style="border-bottom: 1px solid black;">
                <h2>Tulisan Terbaru</h2>
            </div>
            @foreach ($articles as $article)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                        <img src="{{ asset('img/articles_images/' . $article->image) }}" class="img-fluid col-12 rounded-start custom-img-article" alt="...">
                        @else
                            <div style="width: 100%;  background-color: white;" class="img-fluid rounded-start d-flex justify-content-center align-items-center custom-img">
                                <span>No Image</span> <!-- Pesan fallback -->
                            </div>
                        @endif
                    </div>
                    <div class="col-11 col-md-8 order-0 order-md-1">
                        <div class="card-body">
                            <a href="{{route('readArticle', $article->title)}}" style="text-transform: capitalize; font-weight: bold; font-size:1rem;" class="card-title">{{ $article->title }}</a>
                            <p style="text-align:left; font-size:0.9rem; margin-top:1.4rem;" class="card-text">{{ Str::words(strip_tags($article->text_content), 25, '...') }}</p>
                            <p style="margin-top:0.9rem;" class="card-text"><small class="text-body-secondary">Updated {{ $article->created_at->diffForHumans() }} - oleh {{ $article->writer }}</small></p>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            {{ $articles->onEachSide(5)->links() }}
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