<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="{{ url('HeroBiz') }}/assets/image/1ciki-transparan.png" alt=""> --}}
            <h1>BPR<span>. Ciki</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('index') }}">BERANDA</a></li>
                <li class="dropdown megamenu"><a href="#"><span>PRODUK</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @php
                            use App\Models\Tabungan;
                            use App\Models\Deposito;
                            use App\Models\Kredit;

                            $data_tabungan = Tabungan::latest()->get();
                            $data_deposito = Deposito::latest()->get();
                            $data_kredit = Kredit::latest()->get();
                        @endphp
                        <li>
                            <strong style="color:#9aa3ad;">Tabungan</strong>
                            @foreach ($data_tabungan as $tabungan)
                                <a href="{{ route('produk.tabungan', $tabungan->id) }}">{{ $tabungan->judul }}</a>
                            @endforeach
                        </li>
                        <li>
                            <strong style="color:#9aa3ad;">Deposito</strong>
                            @foreach ($data_deposito as $deposito)
                                <a href="{{ route('produk.deposito', $deposito->id) }}">{{ $deposito->judul }}</a>
                            @endforeach
                        </li>
                        <li>
                            <strong style="color:#9aa3ad;">Kredit</strong>
                            @foreach ($data_kredit as $kredit)
                                <a href="{{ route('produk.kredit', $kredit->id) }}">{{ $kredit->judul }}</a>
                            @endforeach
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>LAYANAN</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <a href="{{ route('simulasi.kredit') }}">Simulasi Kredit</a>
                        <a href="{{ route('buka.tabungan') }}">Buka Tabungan</a>
                        <a href="{{ route('buka.deposito') }}">Buka Deposito</a>
                        <a href="{{ route('pengajuan.kredit') }}">Pengajuan Kredit</a>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('laporan') }}">LAPORAN</a></li>
                <li class="dropdown"><a href="#"><span>INFORMASI</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('lelang') }}">Lelang</a></li>
                        <li class="dropdown"><a href="#"><span>Edukasi</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="{{ route('edukasi') }}">Edukasi 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                        <li><a href="{{ route('download') }}">Download Area</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('karir') }}">KARIR</a></li>
                <li class="dropdown"><a href="#"><span>TENTANG KAMI</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{ route('vismis') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ route('direksi') }}">Direksi</a></li>
                        <li class="dropdown"><a href="#"><span>Penghargaan</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="{{ route('penghargaan') }}">Penghargaan 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('jaringan.kantor') }}">Jaringan Kantor</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('contact') }}">KONTAK</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->

        <a class="btn-getstarted scrollto" href="{{ route('login') }}">Login</a>
    </div>
</header><!-- End Header -->
