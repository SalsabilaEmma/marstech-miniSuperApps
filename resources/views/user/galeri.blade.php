@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Galeri</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Galeri</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">

        <div class="container">

            <div class="section-header">
                <h2>Galeri</h2>
                <p>Galeri BPR. Punya Ciki</p>
            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <div class="row g-0 portfolio-container">
                        @foreach ($data_galeri as $galeri)
                            <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item">
                                <img src="{{ url('image/galeri/' . $galeri->file) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $galeri->judul }}</h4>
                                    <a href="{{ url('image/galeri/' . $galeri->file) }}" title="{{ $galeri->judul }}"
                                        data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    {{-- <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a> --}}
                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach

                    </div><!-- End Portfolio Container -->

                </div>

            </div>
            
            <div class="blog-pagination">
                {{-- <div class="justify-content-center"> --}}
                    {{ $data_galeri->links('pagination::bootstrap-5') }}
                {{-- </div> --}}
            </div>

        </div>


    </section><!-- End Portfolio Section -->
@endsection
