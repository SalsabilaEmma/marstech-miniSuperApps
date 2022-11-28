@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Laporan</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Laporan</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section class="inner-page">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Laporan</h2>
                <p>Example inner page template</p>
            </div>

            <div class="section-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Keterangan Laporan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>System Architect</td>
                            <td class="text-center"><button class="btn btn-primary">Download</button></td>
                        </tr>
                    </tbody>
                </table><br>
            </div>
            <div>
                <iframe src="../file/cetak-a4.pdf" width="100%" height="550"></iframe>
            </div>
        </div>
    </section><!-- End Inner Page -->
@endsection
