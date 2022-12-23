@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail {{ $title }} </h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('lelang') }}">{{ $title }}</a></li>
                    <li>Detail {{ $title }}</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Detail {{ $title }}</h2>
                {{-- <p>Example inner page template</p> --}}
            </div>

            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="blog-details">
                        <div class="post-img text-center">
                            @foreach ($data_lelang->gambar as $gambar)
                                <div class="zoom3">
                                    <img src="{{ url('image/lelang/' . $gambar->gambar) }}" class="img-fluid"
                                        style="width:100%" alt="">
                                </div>
                            @break
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($data_lelang->gambar as $gambar)
                            <div class="zoom">
                                <img src="{{ url('image/lelang/' . $gambar->gambar) }}" alt=""
                                    class="img-thumbnail" style="width: 150px">
                            </div>
                        @endforeach
                    </div>

                    

                    {{-- <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            @foreach ($data_lelang->gambar as $gambar)
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="zoom thumbnail">
                                                <img src="{{ url('image/lelang/' . $gambar->gambar) }}" alt=""
                                                    class="img-thumbnail" style="width: 150px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                        <a data-slide="next" href="#media" class="right carousel-control">›</a>
                    </div> --}}
                    <h2 class="title">{{ $data_lelang->judul }}</h2>
                    <div class="meta-top">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-upc-scan"></i> <a href=""><time
                                        datetime="{{ $data_lelang->kode_aset }}">{{ $data_lelang->kode_aset }}</time></a>
                            </li>
                            <li class="d-flex align-items-center"><i class="bi bi-phone"></i> <a
                                    href="{{ url('https://wa.me/') . $data_lelang->no_telp }}"
                                    target="_blank">{{ $data_lelang->no_telp }} <i class="bi bi-link-45deg"></i></a>
                            </li>
                            <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <a href=""><time
                                        datetime="{{ date('d F Y', strtotime($data_lelang->tanggal)) }}">{{ date('d F Y', strtotime($data_lelang->tanggal)) }}</time></a>
                            </li>
                            <li class="d-flex align-items-center"><i class="bi bi-tag"></i><strong><a
                                        href=""><time
                                            datetime="Rp. {{ number_format($data_lelang->harga, 2) }}">Rp.
                                            {{ number_format($data_lelang->harga, 0) }}</time></a></strong>
                            </li>
                        </ul>
                        <ul style="padding-top: 10px">
                            <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a
                                    href="{{ url('https://www.google.com/maps/place/') . $data_lelang->lokasi }}"
                                    target="_blank">{{ $data_lelang->lokasi }} <i class="bi bi-link-45deg"></i></a>
                            </li>
                        </ul>
                    </div><!-- End meta top -->

                    <div class="content">
                        <p>{!! $data_lelang->detail !!}</p>
                        <div class="text-center zoom3">
                            <a href="{{ url('https://wa.me/') . $data_lelang->no_telp }}" target="_blank">
                                <img src="https://www.planeteventz.co.in/assets/images/whatsapp-chat.png"
                                    style="width: 200px" alt="">
                            </a>
                        </div>
                    </div><!-- End post content -->

                    {{-- <div class="meta-bottom">
                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                            <li><a href="#">Business</a></li>
                        </ul>

                        <i class="bi bi-tags"></i>
                        <ul class="tags">
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                    </div><!-- End meta bottom --> --}}

                </article><!-- End blog post -->
            </div>

            <div class="col-lg-4">

                <div class="sidebar">
                    <div class="sidebar-item recent-posts">
                        <h3 class="sidebar-title">Daftar {{ $title }} Lainnya</h3>

                        <div class="mt-3">
                            @foreach ($list_lelang as $lelangs)
                                <div class="post-item mt-3">
                                    @foreach ($lelangs->gambar as $gambar)
                                        <img src="{{ url('image/lelang/' . $gambar->gambar) }}" alt=""
                                            class="flex-shrink-0">
                                    @break
                                @endforeach
                                <div>
                                    <h4><a
                                            href="{{ route('lelang.detail', $lelangs->id) }}">{{ $lelangs->judul }}</a>
                                    </h4>
                                    {{-- <time datetime="{{ date('d F Y', strtotime($lelangs->tanggal)) }}">{{ date('d F Y', strtotime($lelangs->tanggal)) }}</time> --}}
                                    <time datetime="Rp. {{ number_format($lelangs->harga) }}">Rp.
                                        {{ number_format($lelangs->harga) }}</time>
                                </div>
                            </div><!-- End recent post item-->
                        @endforeach
                        <br><a href="{{ route('lelang') }}" class="read-more align-self-start">Lihat Selengkapnya
                            <i class="bi bi-arrow-right"></i></a>
                    </div>

                </div><!-- End sidebar recent posts-->
            </div><!-- End Blog Sidebar -->
        </div>
    </div>
</div>
</section><!-- End Inner Page -->
@endsection
