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
                <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                    voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>

            <div class="row gy-5">

                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ url('HeroBiz') }}/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <p style="font-weight:bold;color: #0ea2bd;">11 Nov 2022</p>
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <br><a href="{{ route('karir.detail') }}" class="read-more align-self-start">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ url('HeroBiz') }}/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <p style="font-weight:bold;color: #0ea2bd;">11 Nov 2022</p>
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                            <br><a href="{{ route('karir.detail') }}" class="read-more align-self-start">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ url('HeroBiz') }}/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <p style="font-weight:bold;color: #0ea2bd;">11 Nov 2022</p>
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <br><a href="{{ route('karir.detail') }}" class="read-more align-self-start">Read More <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
