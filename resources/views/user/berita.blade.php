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


                </div>
            </div>

            <div class="blog-pagination">
                {{-- <div class="justify-content-center"> --}}
                    {{ $data_berita->links('pagination::bootstrap-5') }}
                {{-- </div> --}}
            </div>
        </div>
    </section><!-- End Blog Section -->
@endsection
