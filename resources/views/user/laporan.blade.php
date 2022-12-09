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
                <p>Laporan BPR. Punya Ciki</p>
            </div>

            <div class="section-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul {{ $title }}</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_laporan as $laporan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $laporan->judul }}</td>
                                <td>{{ $laporan->bulan }}</td>
                                <td class="text-center">{{ $laporan->tahun }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info lap" style="color: white" data-id="<?= $laporan['id'] ?>"
                                        data-judul="<?= $laporan['judul'] ?>" data-bulan="<?= $laporan['bulan'] ?>"
                                        data-tahun="<?= $laporan['tahun'] ?>"
                                        data-file="<?= $laporan['file'] ?>">View</button>
                                    {{-- <button class="btn btn-primary">Download</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
            <div>
                <input type="hidden" id="id" name="id">
                <div id="file"></div>
                <iframe id="pdf" style="width: 100%" class="embed-responsive-item" src=""
                    allowfullscreen></iframe>
            </div>
        </div>
    </section><!-- End Inner Page -->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        $('.lap').click(function(e) {

            $('#view').modal('show');
            $("#view").find("#id").attr("value", $(this).data('id'));
            $("#view").find("#judul").attr("value", $(this).data('judul'));
            $("#view").find("#bulan").attr("value", $(this).data('bulan'));
            $("#view").find("#tahun").attr("value", $(this).data('tahun'));
            // $("#view").find("#file").attr("value", $(this).data('file'));
            // console.log($(this).data('id'));
            console.log($(this).data('judul'));
            console.log($(this).data('bulan'));
            console.log($(this).data('tahun'));
            //  console.log($(this).data('file'));
            var file = "{{ url('/') }}/file/laporan/" + $(this).data('file');
            console.log(file);
            $('#file').html(`
                <iframe style="width: 100%; height: 500px" src="${file}" placeholder=""></iframe>
            `);

        });
        // });
    </script>
@endsection
