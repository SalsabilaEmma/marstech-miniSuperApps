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

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ $title }}</h2>
                {{-- <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p> --}}
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
                            <p style="font-weight:bold;color: #0ea2bd;">Rp. {{ number_format($lelang->harga) }}
                            </p>
                            <p>{{ date('d F Y', strtotime($lelang->tanggal)) }}</p>
                            <h4>{{ $lelang->judul }}e</h4>
                            <span>{{ substr($lelang->lokasi,0,75) }} ...</span>
                            <br><a href="{{ route('lelang.detail', $lelang->id) }}" class="read-more align-self-start">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @endforeach
        </div>

    </div>
</section><!-- End Team Section -->
@endsection
