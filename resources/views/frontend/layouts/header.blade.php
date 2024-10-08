<header style="@if (!Request::is("/"))
background-color:blue;
@endif" id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ asset('arsha/assets/img/logo.png') }}" alt=""> -->
            <h1 class="sitename">BOASH</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="{{Request::is("/") ? "active" :""}}">Home</a></li>
                <li class="dropdown">
                    <a href="#"><span>Profil</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Sejarah Boash</a></li>
                        <li><a href="#">Visi Dan Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Program Studi</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                       @foreach ($prodis as $prodi)
                       <li><a href="#">{{$prodi->nama_prodi}}</a></li>
                       @endforeach
                    </ul>
                </li>
                <li><a href="/">Berita</a></li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="/article">Artikel</a></li>
                        <li><a href="#">Kerjasama IDUKA</a></li>
                        <li><a href="#">Kunjungan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Galeri</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Galeri Foto</a></li>
                        <li><a href="#">Galeri Video</a></li>
                    </ul>
                </li>
                <li><a href="/">Hubungi Kami</a></li>
                {{-- Contoh Dropdown --}}
                {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="{{ Request::is('/') ? 'btn-getstarted' : 'btn-getstarted' }}"
        href="/login"
        style="{{ !Request::is('/') ? 'background-color: white; color: black;' : '' }}">
        Login
     </a>


    </div>
</header>
