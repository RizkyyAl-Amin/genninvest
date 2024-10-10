@extends('frontend.layouts.main')

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

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background ">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Politeknik Digital Boash Indonesia</h1>
                    <p>Religious, Entrepreneurship, Global Competence</p>
                    {{-- <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div> --}}
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('arsha/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container" data-aos="zoom-in">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 5,
              "spaceBetween": 120
            },
            "1200": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>
                {{-- <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-1.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-2.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-3.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-4.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-5.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-6.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-7.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('arsha/assets/img/clients/client-8.png') }}"
                            class="img-fluid" alt=""></div>
                </div> --}}
            </div>

        </div>

    </section><!-- /Clients Section -->

    <section style="width: 100%" id="artikel" class="artikel d-flex justify-content-center gap-3 p-3">
        <div class="row col-12 col-md-11 col-lg-10">
            <div class="container col-10 col-md-8 col-lg-8" data-aos="fade-up">
                <h2>Tulisan Terbaru</h2>
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
                                <p style="text-align:left; font-size:0.9rem; margin-top:1.4rem;" class="card-text">{{ Str::words($article->paragraf_1, 25, '...') }}</p>
                                <p style="margin-top:0.9rem;" class="card-text"><small class="text-body-secondary">Updated {{ $article->created_at->diffForHumans() }} - oleh {{ $article->writer }}</small></p>
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
                        <!-- Pindahkan link selengkapnya di sini, tepat setelah paragraf -->
                        <a href="{{ route('sambutan') }}" class="card-link d-block text-center mt-3">Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h3>Address</h3>
                                        <p>{{ $kontak->alamat }}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-facebook"></i>
                                    <div>
                                        <h3>Facebook</h3>
                                        <p><a href="{{ $kontak->fb_url }}" target="_blank">pdbiofficial</a></p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6 mt-0">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email Us</h3>
                                        <p>{{$kontak->email}}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6 mt-0">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-instagram flex-shrink-0"></i>
                                    <div>
                                        <h3>Instagram</h3>
                                        <p><a href="{{ $kontak->ig_url }}" target="_blank">boashpoldibi</a></p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6 mt-0">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-telephone flex-shrink-0"></i>
                                    <div>
                                        <h3>Call Us</h3>
                                        <p>{{$kontak->no_hp}}</p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                            <div class="col-md-6 mt-0">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-youtube flex-shrink-0"></i>
                                    <div>
                                        <h3>Youtube</h3>
                                        <p><a href="{{ $kontak->yt_url }}" target="_blank">Politeknik Digital Boash Indonesia</a></p>
                                    </div>
                                </div><!-- End Info Item -->
                            </div>
                        </div>



                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.869082860281!2d106.73874229509943!3d-6.53821254162451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c3d3e90a6833%3A0x647ad93c3ee36083!2sBoash%20Caffe%20Politeknik%20Digital%20Boash%20Indonesia!5e0!3m2!1sid!2sid!4v1728098572516!5m2!1sid!2sid"
                            frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="name" id="name-field" class="form-control"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject-field"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection

@section('js')
    {{-- Jika ingin menambahkan js khusus pada halaman ini, tambahkan di sini. Jangan di main. --}}
@endsection
