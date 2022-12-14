<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ url('') }}/image/1ciki-transparan.png"
                    class="header-logo" />
                <span class="logo-name">Admin Panel</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            {{-- {{ ($title === 'Dashboard' ? 'active' : '') }} --}}
            <li class="menu-header">Interaksi User</li>
            <li class="dropdown active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Calon
                        Nasabah</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('buka.deposito.list') }}">Pengajuan Buka Deposito</a></li>
                    <li><a class="nav-link" href="{{ route('buka.tabungan.list') }}">Pengajuan Buka Tabungan</a></li>
                    <li><a class="nav-link" href="{{ route('buka.kredit.list') }}">Pengajuan Pembiayaan</a></li>
                </ul>
            </li>
            {{-- <li class="dropdown">
                <a href="#" class="nav-link"><i data-feather="inbox"></i><span>Lamaran Masuk</span></a>
            </li> --}}
            <li class="dropdown">
                <a href="{{ route('kontak.list') }}" class="nav-link"><i data-feather="inbox"></i><span>Kontak (Pesan Masuk)</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('subscribe.list') }}" class="nav-link"><i data-feather="users"></i><span>Pelanggan</span></a>
            </li>

            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="shopping-bag"></i><span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('produk.deposito.list') }}">Deposito</a></li>
                    <li><a class="nav-link" href="{{ route('produk.tabungan.list') }}">Tabungan</a></li>
                    <li><a class="nav-link" href="{{ route('produk.kredit.list') }}">Kredit</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('banner.list') }}"><i data-feather="image"></i><span>Banner</span></a></li>
            <li><a class="nav-link" href="{{ route('video.interaksi.list') }}"><i data-feather="video"></i><span>Video Interaksi</span></a></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="info"></i><span>Informasi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('berita.list') }}">Berita</a></li>
                    <li><a class="nav-link" href="{{ route('lelang.list') }}">Lelang</a></li>
                    <li><a class="nav-link" href="{{ route('edukasi.list') }}">Edukasi</a></li>
                    <li><a class="nav-link" href="{{ route('galeri.list') }}">Galeri</a></li>
                    <li><a class="nav-link" href="{{ route('download.list') }}">Download Area</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('karir.list') }}"><i data-feather="book"></i><span>Karir</span></a></li>
            <li><a class="nav-link" href="{{ route('promo.list') }}"><i data-feather="shopping-cart"></i><span>Promo</span></a></li>
            <li><a class="nav-link" href="{{ route('pencapaian.list') }}"><i data-feather="target"></i><span>Jumlah Pencapaian</span></a>
            </li>
            <li><a class="nav-link" href="{{ route('laporan.list') }}"><i data-feather="file"></i><span>Laporan</span></a></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tentang
                        Kami</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('about.list') }}">About Us</a></li>
                    <li><a class="nav-link" href="{{ route('vismis.list') }}">Visi Misi</a></li>
                    <li><a class="nav-link" href="{{ route('sejarah.list') }}">Sejarah</a></li>
                    <li><a class="nav-link" href="{{ route('penghargaan.list') }}">Penghargaan</a></li>
                    <li><a class="nav-link" href="{{ route('direksi.list') }}">Direksi</a></li>
                    <li><a class="nav-link" href="{{ route('jaringan.list') }}">Jaringan Kantor</a></li>
                    <li><a class="nav-link" href="{{ route('footer.list') }}">Footer</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('user.account.list') }}"><i data-feather="user"></i><span>User Account</span></a></li>
        </ul>
    </aside>
</div>
