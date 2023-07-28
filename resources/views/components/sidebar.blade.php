<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (Auth::user()->hasRole('admin'))
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Lainnya</div>
                    <a class="nav-link" href="{{ route('admin.pendaftaran') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Pendaftaran
                    </a>
                    <a class="nav-link" href="{{ route('admin.rekam-medis') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Rekam Medis
                    </a>
                    {{-- <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Data Dokter
                    </a> --}}
                    {{-- <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Jaga-jaga
                    </a> --}}
                @elseif (Auth::user()->hasRole('dokter'))
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ route('dokter.dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Lainnya</div>
                    <a class="nav-link" href="{{ route('antrian') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Antrian Pasien
                    </a>
                    <a class="nav-link" href="{{ route('rekam-medis') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Riwayat Rekam Medis
                    </a>
                @elseif (Auth::user()->hasRole('pasien'))
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Lainnya</div>
                    <a class="nav-link" href="{{ route('pendaftaran') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pendaftaran
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
