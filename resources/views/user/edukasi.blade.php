@extends('user.layout.app')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Edukasi</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>Edukasi</li>
            </ol>
          </div>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section class="inner-page">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>{{ $data_edukasi->judul }}</h2>
            <p>{{ date('d F Y', strtotime($data_edukasi->tanggal)) }}</p>
          </div>

          <p>
            {!! $data_edukasi->isi !!}
          </p>

        </div>
      </section><!-- End Inner Page -->

@endsection
