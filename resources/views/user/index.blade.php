@extends('user.layout.app')
@section('content')
    <!-- Carousel wrapper -->
    {{-- <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            @foreach ($data_banner as $banner)
                <!-- Single item -->
                <div class="carousel-item active">
                    <img src="{{ url('image/banner/' . $banner->file) }}" class="d-block w-100"
                        alt="Sunset Over the City" />
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>
                            Nulla vitae elit libero, a pharetra augue mollis interdum.
                        </p>
                    </div>
                </div>
            @endforeach
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </div> --}}

  <section id="hero-fullscreen" class="hero-fullscreen d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center position-relative" data-aos="zoom-out">
      <h2>Welcome to <span>HeroBiz</span></h2>
      <p>Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.</p>
      {{-- <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div> --}}
    </div>
  </section>
    <!-- ======= Hero Section ======= -->
    {{-- <section id="hero" class="hero carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        @foreach ($data_banner as $banner)
            <div class="carousel-item active">
                <div class="container">
                    <div class="row justify-content-center gy-6">

                        <div class="col-lg-5 col-md-8">
                            <img src="{{ url('image/banner/' . $banner->file) }}" alt="" class="img-fluid img">
                        </div>

                        <div class="col-lg-9 text-center">
                            <h2>Welcome to HeroBiz</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                        </div>

                    </div>
                </div>
            </div><!-- End Carousel Item -->
        @endforeach

        <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </section> --}}
    <!-- End Hero Section -->

    <main id="main">
        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta">
            <hr><br>
            <div class="section-header">
                <h2>About Us</h2>
                {{-- <p>{!! $data_about->isi !!}</p> --}}
            </div>
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3><em>Tentang</em> BPR. Punya Ciki - Dummy</h3>
                        <p>{!! $data_about->isi !!}</p>
                        <a class="cta-btn align-self-start" href="#">Call To Action</a>
                    </div>

                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            <img src="{{ url('HeroBiz') }}/assets/img/ciki.jpeg" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Call To Action Section -->

        <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="section-header text-left">
                    <h2>Pencapaian Kami Tahun 2022 (dalam ribuan rupiah)</h2>
                </div>
                <div class="row gy-4">
                    @foreach ($data_pencapaian as $pencapaian)
                        <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                            <div class="service-item position-relative">
                                <div class="icon text-center">
                                    @if ($pencapaian->nama == 'Laba')
                                        <i class="bi bi-activity icon"></i>
                                    @elseif ($pencapaian->nama == 'Kredit yang Diberikan')
                                        <i class="bi bi-coin icon"></i>
                                    @elseif ($pencapaian->nama == 'Aset')
                                        <i class="bi bi-bank icon"></i>
                                    @elseif ($pencapaian->nama == 'Modal')
                                        <i class="bi bi-currency-dollar icon"></i>
                                    @endif
                                </div>
                                <strong>
                                    <p class="text-center">{{ $pencapaian->nama }}</p>
                                </strong>
                                <h4><a href="" class="stretched-link">Rp.
                                        {{ number_format($pencapaian->jumlah, 2) }}</a></h4>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach

                </div>
            </div>
        </section>

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita Terbaru</h2>
                    <p>Kumpulan Berita BPR. Punya Ciki</p>
                </div>

                <div class="row">
                    @foreach ($data_berita as $berita)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ url('image/berita/' . $berita->file) }}"
                                        class="img-fluid" alt=""></div>
                                <div class="meta">
                                    <span class="post-date">{{ date('d F Y', strtotime($berita->created_at)) }}</span>
                                    <span class="post-author"> / {{ $author }}</span>
                                </div>
                                <h3 class="post-title">{{ $berita->judul }}</h3>
                                <p>{!! substr($berita->isi, 0, 100) !!} ...</p>
                                <a href="{{ route('berita.detail', $berita->id) }}"
                                    class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <div style="padding-top: 3px;">
                        <hr>
                        <a href="{{ route('berita') }}" style="font-size: 14px; color: #17A2B8">
                            <i class="text-right">(Tampilkan Semua Berita)</i>
                        </a>
                    </div>

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Featured Services Section ======= -->
        {{-- <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="section-header">
                    <h2>Berita Terbaru</h2>
                    <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                        voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <a href="#">
                            <h5 style="color: #89A6C4">Diterpa Badai Covid-19, PT BPR Caruban Indah Tunjukkan Tren Positif
                            </h5>
                        </a>
                        <p style="font-weight:bold;color: #000000">( 14 Hari yang lalu )</p>
                    </div>
                    <div class="col-md-5">
                        <div class="jumbotron p-3 p-md-5 rounded"
                            style="background-image: url(https://bprcarubanindah.com/image/berita/DiterpaBadaiCovid19,PTBPRCarubanIndahTunjukkanTrenPositif.jpg);background-size: cover; background-position: center;">
                            <div class="col-md-6 px-0" style="align:right">
                                <!-- <h5 class="text-white" style="text-shadow: 2px 2px #000000;">MAJU BERSAMA BPR CARUBAN INDAH MENUJU SEJAHTERA</h5> -->
                                <a href="#" class="btn btn-outline-light">Baca Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 3px;"><br><hr></div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <a href="#">
                            <h5 style="color: #89A6C4">Diterpa Badai Covid-19, PT BPR Caruban Indah Tunjukkan Tren Positif
                            </h5>
                        </a>
                        <p style="font-weight:bold;color: #000000">( 14 Hari yang lalu )</p>
                    </div>
                    <div class="col-md-5">
                        <div class="jumbotron p-3 p-md-5 rounded"
                            style="background-image: url(https://bprcarubanindah.com/image/berita/DiterpaBadaiCovid19,PTBPRCarubanIndahTunjukkanTrenPositif.jpg);background-size: cover; background-position: center;">
                            <div class="col-md-6 px-0" style="align:right">
                                <!-- <h5 class="text-white" style="text-shadow: 2px 2px #000000;">MAJU BERSAMA BPR CARUBAN INDAH MENUJU SEJAHTERA</h5> -->
                                <a href="#" class="btn btn-outline-light">Baca Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div style="padding-top: 3px;"> <br> <hr> </div>
                </div>
                <div style="padding-top: 3px;">
                    <a href="" style="font-size: 14px; color: #17A2B8">
                        <i>(Tampilkan Semua Berita)</i></a>
                </div>
            </div>
        </section> --}}
        <!-- End Featured Services Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Daftar Lelang</h2>
                </div>

                <div class="row gy-5">
                    @foreach ($data_lelang as $lelang)
                        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                            <div class="team-member">
                                <div class="member-img">
                                    @foreach ($lelang->gambar as $gambar)
                                        <img src="{{ url('image/lelang/' . $gambar->gambar) }}" class="img-fluid"
                                            alt="">
                                    @break
                                @endforeach
                            </div>
                            <div class="member-info">
                                <h4>{{ $lelang->judul }}</h4>
                                <span>{{ $lelang->lokasi }}</span><br>
                                <a href="{{ route('lelang.detail', $lelang->id) }}"
                                    class="readmore stretched-link">Read More<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
                <div style="padding-top: 3px;">
                    <hr>
                    <a href="{{ route('lelang') }}" style="font-size: 14px; color: #17A2B8">
                        <i class="text-right">(Tampilkan Semua Daftar Lelang)</i>
                    </a>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    {{-- <section id="clients" class="clients">
        <div class="container" data-aos="zoom-out">

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-1.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-2.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-3.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-4.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-5.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-6.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-7.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ url('HeroBiz') }}/assets/img/clients/client-8.png"
                            class="img-fluid" alt=""></div>
                </div>
            </div>

        </div>
    </section><!-- End Clients Section --> --}}

    <!-- ======= On Focus Section ======= -->
    {{-- <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Voluptatem dignissimos provident quasi corporis</h3>
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                    storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                            </ul>
                            <a href="#" class="read-more align-self-start"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}

    <!-- ======= Features Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1 text-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="section-header">
                                <h2>Promo</h2>
                            </div>
                            <div class="testimonials-slider swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($data_promo as $promo)
                                        <div class="swiper-slide">
                                            <img src="{{ url('image/promo/' . $promo->file) }}" alt=""
                                                class="img-fluid" style="width: 650px">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar">
                                <div class="sidebar-item recent-posts">
                                    <h3 class="sidebar-title">Info Karir</h3>
                                    <div class="mt-3">
                                        @foreach ($list_karir as $karir)
                                            <div class="post-item mt-3">
                                                <img src="{{ url('image/pengumuman-karir/' . $karir->file) }}"
                                                    alt="" class="flex-shrink-0" height="auto">
                                                <div>
                                                    <h4><a
                                                            href="{{ route('karir.detail', $karir->id) }}">{{ $karir->judul }}</a>
                                                    </h4>
                                                    <time
                                                        datetime="{{ $karir->created_at }}">{{ $karir->created_at }}</time>
                                                </div>
                                            </div><!-- End recent post item-->
                                        @endforeach
                                    </div><br>
                                    <a href="#" class="cta-btn align-self-start"><span>Lihat Selengkapnya
                                        </span><i class="bi bi-arrow-right"></i></a>
                                </div><!-- End sidebar recent posts-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            {{-- <div class="section-header">
                    <h2>Our Pricing</h2>
                    <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                        voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
                </div> --}}
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item">

                        <div class="pricing-header">
                            <h5 style="color: white">Info Bank Indonesia</h5>
                            {{-- <h4><sup>$</sup>0<span> / month</span></h4> --}}
                        </div>
                        <iframe width="100%" height="100%" src="http://sipo.perbamida.or.id/embed/sukubunga"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pricing-item featured">

                        <div class="pricing-header">
                            <h5 style="color: white">UPDATE SUKU BUNGA TABUNGAN & DEPOSITO</h5>
                            {{-- <h4><sup>$</sup>29<span> / month</span></h4> --}}
                        </div>

                        <div style="padding-top: 20px">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Suku Bunga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                    <div class="pricing-item">

                        <div class="pricing-header">
                            <h5 style="color: white">LAPORAN BPR TUNAS ARTHA BARU</h5>
                            {{-- <h4><sup>$</sup>49<span> / month</span></h4> --}}
                        </div>
                        <div class="box-shadow mb-2" align="center" style="padding-top: 20px">
                            <a href="{{ route('laporan') }}"><img style="width: 100%"
                                    src="https://tunasarthabaru.co.id/image/ATB-LAPORAN.png" loading="lazy"></a>
                        </div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

        </div>
    </section><!-- End Pricing Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">

                    @foreach ($data_video as $video)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="col-md-12">
                                    <iframe class="embed-responsive-item" style="height: 100%"
                                        src="https://www.youtube.com/embed/{{ explode('v=', $video->link)[1] }}"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                {{-- https://www.youtube.com/embed/{{ explode('v=',  $video->link)[1] }} --}}
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection
