@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Karir</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Karir</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Pengumuman Lowongan Kerja</h2>
                {{-- <p>Dapatkan Informasi </p> --}}
            </div>

            <div class="row gy-5">
                @foreach ($data_karir as $karir)
                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{url('/image/pengumuman-karir/' .$karir->file)}}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <p style="font-weight:bold;color: #0ea2bd;">Batas Waktu : {{ date('d F Y', strtotime($karir->tglmax)) }}</p>
                            <h4>{{ $karir->judul }}</h4>
                            <p>{{ date('d F Y', strtotime($karir->created_at)) }}</p>
                            <br><a href="{{ route('karir.detail', $karir->id) }}" class="read-more align-self-start">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
