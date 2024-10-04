<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="/home">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('prodi*')) ? 'active' : '' }}" href="/prodi">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Program Studi</span>
            </a>
        </li>
        <li class="nav-item">

            <a class="nav-link" href="{{ route('kerjasama.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Kerja Sama</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}" href="/user">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('berita*')) ? 'active' : '' }}" href="/berita">
                <i class="ti-world menu-icon"></i>
                <span class="menu-title">Berita</span>
            </a>
        </li>

         <li class="nav-item">

            <a class="nav-link" href="{{ route('article.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Article</span>
            </a>
        </li>
        
        <li class="nav-item">


            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="assets/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="assets/pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="assets/pages/forms/basic_elements.html">Basic
                            Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/tables/basic-table.html">Basic
                            table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/icons/mdi.html">Mdi
                            icons</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/login.html">
                            Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/register.html">
                            Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Error pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/error-404.html"> 404
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="assets/pages/samples/error-500.html"> 500
                        </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="assets/pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
