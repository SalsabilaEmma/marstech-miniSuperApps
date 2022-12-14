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

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container">

                    <div class="section-header">
                        <h2>{{ $title }} Kami</h2>
                        <p>Kirim Pesan atau Pengaduan Anda Kepada Kami</p>
                    </div>

                </div>
                <div class="container">

                    <div class="row gy-5 gx-lg-5">

                        <div class="col-lg-4">

                            <div class="info">
                                <h3>BPR. Punya Ciki</h3>
                                @foreach ($data_about as $about)
                                    <p class="text-center" style="font-size: 10pt">{!! $about->isi !!}</p>
                                @endforeach

                                @foreach ($data_footer as $footer)
                                    <div class="info-item d-flex">
                                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                                        <div>
                                            <h4>Location:</h4>
                                            <p>{{ $footer->alamat_lengkap }}</p>
                                        </div>
                                    </div><!-- End Info Item -->

                                    <div class="info-item d-flex">
                                        <i class="bi bi-envelope flex-shrink-0"></i>
                                        <div>
                                            <h4>Email:</h4>
                                            <p>{{ $footer->email }}</p>
                                        </div>
                                    </div><!-- End Info Item -->

                                    <div class="info-item d-flex">
                                        <i class="bi bi-phone flex-shrink-0"></i>
                                        <div>
                                            <h4>Call:</h4>
                                            <p>{{ $footer->no_telp }}</p>
                                        </div>
                                    </div><!-- End Info Item -->
                                @endforeach

                            </div>

                        </div>

                        <div class="col-lg-8">
                            {{--  role="form" class="php-email-form" --}}
                            <form action="{{ route('kontak.store') }}" method="post" id="recaptcha-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subjek" id="subjek"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="isi" placeholder="Message" required></textarea>
                                </div>
                                <div class="my-3">
                                    {{-- <div class="loading">Loading</div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                    <div class="error-message">Error!</div> --}}
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible show fade">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center"><button class="btn btn g-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                        data-action='submit' style="color: white; background-color:#0ea2bd"
                                        type="submit">Send Message</button></div>
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div><br>
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2960152550677!2d106.80133685004488!3d-6.22464529547199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1467d40f317%3A0x516d3bc0fd7c5a93!2sSM%20Entertainment%20Indonesia!5e0!3m2!1sid!2sid!4v1670836603725!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen></iframe>
                </div><!-- End Google Maps -->

            </section><!-- End Contact Section -->

        </div>
    </section><!-- End Inner Page -->
@endsection
