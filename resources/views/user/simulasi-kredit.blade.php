@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Simulasi Kredit</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Simulasi Kredit</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section class="inner-page">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Simulasi Kredit</h2>
                {{-- <p>Example inner page template</p> --}}
            </div>

            <iframe width="100%" height="1000" src="http://sipo.perbamida.or.id/embed/simulasikredit" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen="">
            </iframe>

        </div>
    </section><!-- End Inner Page -->
@endsection
