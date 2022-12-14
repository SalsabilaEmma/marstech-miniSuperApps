@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail {{ $title }}</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('karir') }}">{{ $title }}</a></li>
                    <li>Detail {{ $title }}</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ $data_karir->judul }}</h2>
                {{-- <p></p> --}}
            </div>

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img text-center zoom3" style="padding-top: 20px">
                            <img src="{{ url('/image/pengumuman-karir/' . $data_karir->file) }}" alt=""
                                class="img-fluid">
                        </div>

                        <h2 class="title">{{ $data_karir->judul }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time
                                            datetime="{{ date('d F Y', strtotime($data_karir->tglmax)) }}">{{ date('d F Y', strtotime($data_karir->tglmax)) }}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-envelope"></i> <a
                                        href="">email@gmail.com</a></li>
                                {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">12 Comments</a></li> --}}
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p>{!! $data_karir->isi !!}</p>
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
                            <h3 class="sidebar-title">Pengumuman {{ $title }} Lainnya</h3>

                            <div class="mt-3">
                                @foreach ($list_karir as $karir)
                                    <div class="post-item mt-3">
                                        <img src="{{ url('/image/pengumuman-karir/' . $karir->file) }}" alt=""
                                            class="flex-shrink-0">
                                        <div>
                                            <h4><a href="{{ route('karir.detail', $karir->id) }}">{{ $karir->judul }}</a></h4>
                                            <time datetime="{{ date('d F Y', strtotime($karir->tglmax)) }}">{{ date('d F Y', strtotime($karir->tglmax)) }}</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                @endforeach

                                <br><a href="{{ route('karir') }}" class="read-more align-self-start">Lihat Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </div><!-- End sidebar recent posts-->
                    </div><!-- End Blog Sidebar -->
                </div>
            </div>
        </div>
    </section><!-- End Inner Page -->
@endsection
