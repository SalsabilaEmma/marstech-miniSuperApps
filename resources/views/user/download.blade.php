@extends('user.layout.app')
@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Download Area</h2>
            <ol>
              <li><a href="{{ route('index') }}">Home</a></li>
              <li>Download Area</li>
            </ol>
          </div>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Blog Section ======= -->
      <section class="inner-page">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Download Area</h2>
            <p>Example inner page template</p>
          </div>

          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Download</th>
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
