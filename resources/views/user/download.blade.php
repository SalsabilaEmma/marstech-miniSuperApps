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

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama File</th>
                    <th class="text-center">Download</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_download as $download)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $download->judul }}</td>
                    <td class="text-center">
                        <a href="{{ route('download.downloadFile', $download->id) }}">
                        {{-- <a href="{{ route('download.downloadFile', $download->file) }}"> --}}
                            <button class="btn btn-primary">Download</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Download</th>
                </tr>
            </tfoot> --}}
        </table>

        </div>
      </section><!-- End Inner Page -->

@endsection
