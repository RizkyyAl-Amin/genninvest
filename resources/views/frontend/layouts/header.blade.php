<header style="@if (!Request::is('/')) background-color:#ffffff; @endif background-color:#ffffff; " id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
           <img src="{{ asset('arsha/assets/img/logo.svg') }}" alt="geninvest" sizes="2">
           
        </a>

        <nav id="navmenu" class="navmenu" >
            <ul >
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="/">Artikel</a></li>
                <li><a href="/">Pusat Bantuan</a></li>
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
        href="/login">
        Login
     </a>


    </div>
</header>
