@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail {{ $title }}</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('berita') }}">{{ $title }}</a></li>
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
                <p>{{ $data_berita->judul }}</p>
            </div>

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img text-center">
                            <img src="{{ url('image/berita/' . $data_berita->file) }}" alt="" class="img-fluid" style="width: 100%">
                        </div>

                        <h2 class="title">{{ $data_berita->judul }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="">{{ $author }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href=""><time
                                            datetime="{{ date('d F Y', strtotime($data_berita->created_at)) }}">{{ date('d F Y', strtotime($data_berita->created_at)) }}</time></a>
                                </li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p>{!! $data_berita->isi !!}</p>
                            {{-- <blockquote>
                    <p>
                      Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                    </p>
                  </blockquote> --}}
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
                            <h3 class="sidebar-title">{{ $title }} Lainnya</h3>

                            <div class="mt-3">
                                @foreach ($list_berita as $berita)
                                    <div class="post-item mt-3">
                                        <img src="{{ url('image/berita/' . $berita->file) }}" alt=""
                                            class="flex-shrink-0">
                                        <div>
                                            <h4><a href="{{ route('berita.detail', $berita->id) }}">{{ $berita->judul }}</a></h4>
                                            <time datetime="{{ date('d F Y', strtotime($berita->created_at)) }}">{{ date('d F Y', strtotime($berita->created_at)) }}</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                @endforeach

                                <br><a href="{{ route('berita') }}" class="read-more align-self-start">Lihat Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </div><!-- End sidebar recent posts-->
                    </div><!-- End Blog Sidebar -->
                </div>
            </div>
        </div>
    </section><!-- End Inner Page -->
@endsection
