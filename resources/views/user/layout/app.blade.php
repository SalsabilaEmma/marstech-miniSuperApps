<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BPR. Punya Ciki - Dummy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('HeroBiz') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('HeroBiz') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('HeroBiz') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('HeroBiz') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('HeroBiz') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('HeroBiz') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('HeroBiz') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ url('HeroBiz') }}/assets/css/variables.css" rel="stylesheet">
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="{{ url('HeroBiz') }}/assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ url('HeroBiz') }}/assets/css/main.css" rel="stylesheet">
    <!-- tambahan -->
    <link rel='shortcut icon' type='image/x-icon' href='{{ url('') }}/image/1ciki-transparan.png' />
    <link rel="stylesheet" type="text/css" href="{{ url('HeroBiz') }}/assets/js/datatables.min.css" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <link href="{{ url('HeroBiz') }}/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    @section('css')
    @show
    @yield('css')
</head>

<body>

    @include('user.layout.header')
    @yield('content')
    @include('user.layout.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ url('HeroBiz') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('HeroBiz') }}/assets/js/main.js"></script>

    <!-- tambahan -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="{{ url('HeroBiz') }}/assets/js/datatables.min.js"></script>
    <script src="{{ url('HeroBiz') }}/assets/js/jsdatatables.js"></script>


    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="{{ url('HeroBiz') }}/assets/owlcarousel/owl.carousel.min.js"></script>


    <!-- GOOGLE RECAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("recaptcha-form").submit();
        }
    </script>

    <!-- Wilayah -->
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "get",
                // url: "https://tunasarthabaru.co.id/assync/provinsi",
                url: "{{ route('provinsi') }}",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    let dataprov = '<option selected hidden value="">- Pilih Provinsi -</option>'
                    response.forEach(function(res) {
                        dataprov += '<option value="' + res.name + '" idProv="' + res.id +
                            '">' + res.name + '</option>';
                    });
                    $('#provinsi').html(dataprov);
                }
            });

            $('select[name=provinsi]').on('change', function() {
                var idProv_selected = $('option:selected', this).attr('idProv');
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/distrik",
                    url: "{{ route('distrik') }}",
                    data: 'id_provinsi=' + idProv_selected,
                    dataType: "JSON",
                    success: function(resDistrik) {
                        console.log(resDistrik);
                        let datadistrik =
                            '<option selected hidden value="">- Pilih Kota / Kabupaten -</option>'
                        resDistrik.forEach(function(res) {
                            datadistrik += '<option value="' + res.name +
                                '" idDistrik="' + res.id + '">' + res.name +
                                '</option>';
                        });
                        $('#distrik').html(datadistrik);
                    }
                });
            });

            $('select[name=kab_kota]').on('change', function() {
                var idDistrik_selected = $('option:selected', this).attr('idDistrik');
                // alert(idDistrik_selected);
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/kecamatan",
                url: "{{ route('kecamatan') }}",
                    data: 'id_kabupaten=' + idDistrik_selected,
                    dataType: "JSON",
                    success: function(resKec) {
                        console.log(resKec);
                        let datakec =
                            '<option selected hidden value="">- Pilih Kecamatan -</option>'
                        resKec.forEach(function(res) {
                            datakec += '<option value="' + res.name + '" idKec="' + res
                                .id + '">' + res.name + '</option>';
                        });
                        $('#kecamatan').html(datakec);
                    }
                });
            });

            $('select[name=kecamatan]').on('change', function() {
                var idKec_selected = $('option:selected', this).attr('idKec');
                // alert(idDistrik_selected);
                $.ajax({
                    type: "get",
                    // url: "https://tunasarthabaru.co.id/assync/desa",
                url: "{{ route('desa') }}",
                    data: 'id_kecamatan=' + idKec_selected,
                    dataType: "JSON",
                    success: function(resDesa) {
                        console.log(resDesa);
                        let datadesa =
                            '<option selected hidden value="">- Pilih Kelurahan / Desa -</option>'
                        resDesa.forEach(function(res) {
                            datadesa += '<option value="' + res.name + '" idDesa="' +
                                res.id + '">' + res.name + '</option>';
                        });
                        $('#desa').html(datadesa);
                    }
                });
            });

        });
    </script>
@show
@yield('js')
</body>

</html>
