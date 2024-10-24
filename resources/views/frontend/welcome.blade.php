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

        .card-direktur {
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

            .card-direktur {
                border: #f3f4f6
            }
        }
    </style>

    {{-- Jika ingin menambahkan css khusus pada halaman ini, tambahkan di sini. Jangan di main. --}}
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section"
        style="background-image: url('{{ asset('arsha/assets/img/home-bg.svg') }}') !important;">

        <div class="container">
            <div class="row gy-4">

                <div class="justify-content-center" data-aos="zoom-out" style="text-align: center">
                    <h1> <span style="color: black"> Selamat Datang Di</span> GENINVEST</h1>
                    <div>


                        <p style="color: black" class="pt-5">Wujudkan Keuangan Masa Depan Anda <br>
                            dengan Investasi Cerdas di GENINVEST</p>

                    </div>
                    {{-- <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div> --}}
                </div>
                {{-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('arsha/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div> --}}
            </div>
        </div>

    </section><!-- /Hero Section -->


    <section id="contact" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kenapa GEINVEST?</h2>
            <p>GENINVEST hadir untuk membantumu mencapai tujuan finansial dengan solusi investasi yang mudah, aman, dan <br>
                terpercaya. Kami menyediakan layanan yang dirancang untuk semua kalangan, dari pemula hingga profesional.
            </p>
        </div><!-- End Section Title -->
        <div class="kel-warp">
            <div class="faq-container content" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div>
                        <div class="wrap-why">
                            <div class="why-us">
                                <div class="content">
                                    <div class="icon">
                                        <div class="icon-circle">
                                            <img src="{{ asset('arsha/assets/img/coin.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <h3>Investasi Terjangkau</h3>
                                    <p>Mulai investasi dengan modal kecil sesuai kemampuanmu. GENINVEST memungkinkan siapa
                                        pun untuk memulai investasi tanpa harus menunggu modal besar, cocok untuk semua
                                        kalangan..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="faq-container content" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div>
                        <div class="wrap-why">
                            <div class="why-us">
                                <div class="content">
                                    <div class="icon">
                                        <div class="icon-circle">
                                            <img src="{{ asset('arsha/assets/img/easy.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <h3>Pengelolaan Mudah</h3>
                                    <p>Kelola dan pantau portofoliomu melalui satu dashboard yang sederhana. Semua informasi
                                        penting tersedia, memudahkan pengambilan keputusan investasi di mana saja.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-container content" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div>
                        <div class="wrap-why">
                            <div class="why-us">
                                <div class="content">
                                    <div class="icon">
                                        <div class="icon-circle">
                                            <img src="{{ asset('arsha/assets/img/growing.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <h3>Keuntungan Transparan</h3>
                                    <p>Setiap hasil investasimu ditampilkan dengan jelas. GENINVEST memberikan laporan yang
                                        mudah dipahami, memastikan kamu selalu tahu bagaimana keuntungan diperoleh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="contact" class="contact section" style="background-color: #E1EDF4">
        <div class="kel-warp" style="">
            <img src="{{ asset('arsha/assets/img/logo.svg') }}" alt="" class="big-logo">





            <div class=" info warp" style="flex: 0 0 60.33333%;">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Tentang Kami</h2>
                </div>
                <p style="width: 650px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet nulla quis
                    <br>nisi dapibus cursus. Fusce ut ultricies lacus, ut sollicitudin orci. Phasellus sed ante quis leo
                    ultricies efficitur. Ut placerat tincidunt lectus, nec sollicitudin urna pretium id. Nullam sit amet
                    faucibus magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas. Integer ut ante non nunc aliquet maximus. Curabitur vitae erat at arcu consectetur aliquet.
                    Etiam vestibulum nisi ac risus malesuada, eget facilisis felis tristique.
                </p>
            </div>
        </div>

    </section>

    <section style="width: 100%" id="artikel" class="why-us section">

        <div class="arc-warp" data-aos="fade-up">
            <div class="container section-title" data-aos="fade-up">
                <h2>Artikel Terbaru</h2>
            </div>
            @foreach ($articles as $article)
                <div class="arc-container content" data-aos="fade-up" data-aos-delay="100">
                    <div class="wrap-why">
                        <div class="why-us">
                            <div class="icon">
                                @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                                    <img src="{{ asset('img/articles_images/' . $article->image) }}"
                                        class="img-fluid custom-img-article" alt="...">
                                @else
                                    <div class="custom-img">
                                        <span>No Image</span>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('readArticle', $article->title) }}"
                                class="card-title">{{ $article->title }}</a>

                            <p class="card-text">
                                <small class="text-body-secondary">Updated {{ $article->created_at->diffForHumans() }} -
                                    oleh
                                    {{ $article->user->name }}</small>
                                <small class="text-body-secondary">Kategori -
                                    {{ $article->kategori->nama }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>




    </section>



    <section id="contact" class="contact section" style="background-color: #E1EDF4">






        <div class=" info warp" style="">
            
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
            </div>
            <div class="kel-warpd" style="">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Jambi - Muara Bulian No.KM. 15 Mendalo Darat <br>Kec. Jambi Luar Kota Kab. Muaro Jambi Jambi</p>
                    </div>
                </div><!-- End Info Item -->
            
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>namaemail88@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->
            
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 51 <br> +1 5589 55488 51</p>
                    </div>
                </div><!-- End Info Item -->
            </div>
            




            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.2405230284635!2d103.5181181994084!3d-1.6113912071484124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2588f48ba4d2f3%3A0x3595db7f5bb6e995!2sUniversitas%20Jambi!5e0!3m2!1sid!2sid!4v1729757021872!5m2!1sid!2sid"
                width="600" height="450" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection

@section('js')
    {{-- Jika ingin menambahkan js khusus pada halaman ini, tambahkan di sini. Jangan di main. --}}
@endsection
<div class="info-wrap">

</div>
