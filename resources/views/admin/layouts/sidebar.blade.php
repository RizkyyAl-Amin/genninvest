<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="/user">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('kategori-article*') ? 'active' : '' }}" href="/kategoriArticle">
                <i class="ti-world menu-icon"></i>
                <span class="menu-title">Kategori Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('article*') ? 'active' : '' }}" href="/be/article">
                <i class="ti-world menu-icon"></i>
                <span class="menu-title">Artikel</span>
            </a>
        </li>

        <li class="nav-item">

            <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Kontak</span>
            </a>
        </li>
    </ul>
</nav>
