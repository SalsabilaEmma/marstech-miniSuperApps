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
    <section class="inner-page">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ $title }}</h2>
                {{-- <p>Example inner page template</p> --}}
            </div>
            @foreach ($data_vismis as $vismis)
                <p>{!! $vismis->isi !!}</p>
            @endforeach

        </div>
    </section><!-- End Inner Page -->
@endsection
