@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $title }}</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>{{ $title }}</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ $title }}</h2>
                <p>Berita Terkini</p>
            </div>

            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row gy-4 posts-list">
                        @foreach ($data_berita as $berita)
                            <div class="col-lg-4">
                                <article class="d-flex flex-column">
                                    <div class="post-img">
                                        <img src="{{ url('image/berita/' . $berita->file) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <h2 class="title">
                                        <a href="{{ route('berita.detail', $berita->id) }}">{{ $berita->judul }}</a>
                                    </h2>
                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                    href="">{{ $author }}</a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                    href=""><time
                                                        datetime="2022-01-01">{{ date('d F Y', strtotime($berita->created_at)) }}</time></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="content">
                                        <p>{!! substr($berita->isi, 0, 150) !!} ...</p>
                                    </div>
                                    <div class="read-more mt-auto align-self-end">
                                        <a href="{{ route('berita.detail', $berita->id) }}">Read More</a>
                                    </div>

                                </article>
                            </div><!-- End post list item -->
                        @endforeach

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                {{-- <div class="col-lg-4">

                    <div class="sidebar">

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">{{ $title }} Lainnya</h3>

                            <div class="mt-3">
                                @foreach ($data_berita as $berita)
                                    <div class="post-item mt-3">
                                        <img src="{{ url('image/berita/' . $berita->file) }}" alt=""
                                            class="flex-shrink-0">
                                        <div>
                                            <h4><a href="{{ route('berita.detail', $berita->id) }}">{{ $berita->judul }}</a></h4>
                                            <time datetime="{{ date('d F Y', strtotime($berita->created_at)) }}">{{ date('d F Y', strtotime($berita->created_at)) }}</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                @endforeach

                                <br><a href="{{ route('berita') }}" class="read-more align-self-start">Lihat Selengkapnya
                                    <i class="bi bi-arrow-right"></i></a>

                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End Blog Sidebar -->

                </div> --}}

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
