@extends('user.layout.app')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Produk Kredit</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>Produk Kredit</li>
            </ol>
          </div>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section class="inner-page">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Produk Kredit {{ $data_kredit->judul }}</h2>
              </div>

              <p>{{ $data_kredit->isi }}</p>

        </div>
      </section><!-- End Inner Page -->

@endsection
