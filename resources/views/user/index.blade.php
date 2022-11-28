@extends('user.layout.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="10000">

        <div class="carousel-item active">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ url('HeroBiz') }}/assets/img/hero-carousel/hero-carousel-1.svg" alt=""
                            class="img-fluid img">
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

        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ url('HeroBiz') }}/assets/img/hero-carousel/hero-carousel-2.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>At vero eos et accusamus</h2>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id
                            quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                            Temporibus autem quibusdam et aut officiis debitis aut.</p>
                        <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-center gy-6">

                    <div class="col-lg-5 col-md-8">
                        <img src="{{ url('HeroBiz') }}/assets/img/hero-carousel/hero-carousel-3.svg" alt=""
                            class="img-fluid img">
                    </div>

                    <div class="col-lg-9 text-center">
                        <h2>Temporibus autem quibusdam</h2>
                        <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                            aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                            nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                        <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
                    </div>

                </div>
            </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta">
            <hr><br>
            <div class="section-header">
                <h2>About Us</h2>
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3><em>Tentang</em> BPR. Punya Ciki - Dummy</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
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
                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                            <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                            <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                            <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                        </div>
                    </div><!-- End Service Item -->

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
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ url('HeroBiz') }}/assets/img/blog/blog-1.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date">Tue, December 12</span>
                                <span class="post-author"> / Julia Parker</span>
                            </div>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur
                                sit</h3>
                            <p>Illum voluptas ab enim placeat. Adipisci enim velit nulla. Vel omnis laudantium.
                                Asperiores eum ipsa est officiis. Modi cupiditate exercitationem qui magni est...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ url('HeroBiz') }}/assets/img/blog/blog-2.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date">Fri, September 05</span>
                                <span class="post-author"> / Mario Douglas</span>
                            </div>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <p>Voluptatem nesciunt omnis libero autem tempora enim ut ipsam id. Odit quia ab eum
                                assumenda. Quisquam omnis aliquid necessitatibus tempora consectetur doloribus...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ url('HeroBiz') }}/assets/img/blog/blog-3.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="meta">
                                <span class="post-date">Tue, July 27</span>
                                <span class="post-author"> / Lisa Hunter</span>
                            </div>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <p>Quia nam eaque omnis explicabo similique eum quaerat similique laboriosam. Quis omnis
                                repellat sed quae consectetur magnam veritatis dicta nihil...</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    <div style="padding-top: 3px;"><hr>
                        <a href="" style="font-size: 14px; color: #17A2B8">
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

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Daftar Lelang</h2>
                </div>
                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ url('HeroBiz') }}/assets/img/about.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="pt-0 pt-lg-5"><strong> Rumah & Tanah - 170799</strong></h3>
                        <div class="tab-pane fade show active" id="tab1">

                            <div class="d-flex align-items-center mt-4">
                                <h4>Jalanin aja dulu Ds. Ciki, Madiun</h4>
                            </div>
                            <a class="read-more"><span>Rp. 252.070.000</span></a>
                            <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi
                                dolorum non eveniet magni quaerat nemo et.</p>
                            <a href="#" class="cta-btn align-self-start"><span>Lihat Selengkapnya</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div><!-- End Tab 1 Content -->
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
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
        </section><!-- End Clients Section -->

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

                                <div class="testimonials-slider swiper">
                                    <div class="swiper-wrapper">

                                        <div class="swiper-slide">
                                            <img src="{{ url('HeroBiz') }}/assets/img/features-1.svg" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                                <div class="sidebar">
                                    <div class="sidebar-item recent-posts">
                                        <h3 class="sidebar-title">Info Karir</h3>

                                        <div class="mt-3">

                                            <div class="post-item mt-3">
                                                <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-1.jpg"
                                                    alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a href="blog-post.html">Judul Karir</a></h4>
                                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                                </div>
                                            </div><!-- End recent post item-->

                                            <div class="post-item">
                                                <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-2.jpg"
                                                    alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a href="blog-post.html">Quidem autem et impedit</a></h4>
                                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                                </div>
                                            </div><!-- End recent post item-->

                                            <div class="post-item">
                                                <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-3.jpg"
                                                    alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a href="blog-post.html">Id quia et et ut maxime similique
                                                            occaecati ut</a></h4>
                                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                                </div>
                                            </div><!-- End recent post item-->

                                            <div class="post-item">
                                                <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-4.jpg"
                                                    alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a href="blog-post.html">Laborum corporis quo dara net para</a>
                                                    </h4>
                                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                                </div>
                                            </div><!-- End recent post item-->

                                            <div class="post-item">
                                                <img src="{{ url('HeroBiz') }}/assets/img/blog/blog-recent-5.jpg"
                                                    alt="" class="flex-shrink-0">
                                                <div>
                                                    <h4><a href="blog-post.html">Et dolores corrupti quae illo quod
                                                            dolor</a></h4>
                                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                                </div>
                                            </div><!-- End recent post item-->

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

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="tab-content">
                    <div class="col-md-12">
                        <div class="jumbotron p-3 p-md-5 rounded"
                            style="background-image: url(https://images.pexels.com/photos/866351/pexels-photo-866351.jpeg?auto=compress&cs=tinysrgb&w=600);background-size: cover; background-position: center;">
                            <div class="col-md-6 px-0" style="align:right">

                                <div class="col-12">
                                    <div class="elements-title mb-30">
                                        <h2 class="text-white">Pencapaian Kami Tahun 2021 (dalam ribuan rupiah)</h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="credit-cool-facts-area">
                                        <div class="row justify-content-around">

                                                <div class="col-12 col-sm-6 col-lg-6">
                                                    <!-- Single Cool Facts -->
                                                    <div class="single-cool-fact d-flex align-items-center mb-100">

                                                        <div class="scf-text">
                                                            <h2><span class="counter text-white">jumlah</span></h2>
                                                            <div class="dropdown-divider"></div>
                                                            <p class="text-white">nama</p>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
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
                            <iframe width="100%" height="100%" src="http://sipo.perbamida.or.id/embed/sukubunga"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
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
                                <a href=""><img style="width: 100%" src="https://tunasarthabaru.co.id/image/ATB-LAPORAN.png" loading="lazy"></a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Services</h2>
                    <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                        dolores adipisci aliquam.</p>
                </div>

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-1.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-activity"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Nesciunt Mete</h3>
                                </a>
                                <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus
                                    dolores iure perferendis.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-2.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-broadcast"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Eosle Commodi</h3>
                                </a>
                                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque
                                    eum hic non ut nesciunt dolorem.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-3.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-easel"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Ledo Markt</h3>
                                </a>
                                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                                    voluptas adipisci eos earum corrupti.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-4.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-bounding-box-circles"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Asperiores Commodit</h3>
                                </a>
                                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea
                                    fuga sit provident adipisci neque.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-5.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-calendar4-week"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Velit Doloremque</h3>
                                </a>
                                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut.
                                    Sed animi at autem alias eius labore.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="700">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ url('HeroBiz') }}/assets/img/services-6.jpg" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi bi-chat-square-text"></i>
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>Dolori Architecto</h3>
                                </a>
                                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                                    Corrupti recusandae ducimus enim.</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>
        </section><!-- End Services Section --> --}}

        <!-- ======= F.A.Q Section ======= -->
        {{-- <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5">
                            <h3>Frequently Asked <strong>Questions</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Non consectetur a erat nam at lectus urna duis?
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                        laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                        rhoncus dolor purus non.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                        suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                        convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-4">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                                    </button>
                                </h3>
                                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-5">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                                    </button>
                                </h3>
                                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim
                                        suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan.
                                        Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit
                                        turpis cursus in
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
                </div>

            </div>
        </section><!-- End F.A.Q Section --> --}}

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                {{-- <div class="videoWrapper">
                                    <iframe src="https://www.youtube.com/watch?v=Y48EAk_qMf0&list=RD5YlJt5EYrlM&index=24" frameborder="0" allowfullscreen class="video"></iframe>
                                </div> --}}
                                <iframe style="width: 560; height:315;" frameborder="0" src="https://www.youtube.com/embed/k-U9YOXG4Qg" allowfullscreen>
                                </iframe>
                                {{-- https://www.youtube.com/embed/{{ explode('v=',  $video->link)[1] }} --}}
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->
@endsection
