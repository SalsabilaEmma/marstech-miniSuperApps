@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="card-body">
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
                                <div style="padding-left: 25px">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#tambahdata">Tambah Data</button>
                                </div><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="save-stage" style="width:100%;">
                                        {{--  id="save-stage myTable" --}}
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px">No</th>
                                                <th>Judul</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th style="width: 250px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_laporan as $laporan)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $laporan->judul }}</td>
                                                    <td>{{ $laporan->bulan }}</td>
                                                    <td>{{ $laporan->tahun }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('laporan.destroy', $laporan->id) }}"
                                                            method="POST">
                                                            <button type="button" class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $laporan->id }}"
                                                                data-judul="{{ $laporan->judul }}"
                                                                data-bulan="{{ $laporan->bulan }}"
                                                                data-tahun="{{ $laporan->tahun }}"
                                                                data-file="{{ $laporan->file }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button>
                                                            <a href="{{ route('laporan.edit', $laporan->id) }}"
                                                                class="btn btn-sm btn-outline-success"><i
                                                                    data-feather="edit"></i> Edit
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                    data-feather="trash-2"></i> Hapus</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Tambah {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporan.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Judul {{ $title }}</label>
                            <div class="input-group">
                                <input type="text" required class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Judul {{ $title }}" name="judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select class="form-control @error('bulan') is-invalid @enderror" required
                                        name="bulan" id="bulan">
                                        <?php
                                        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        ?>
                                        <option selected hidden value="">-Pilih Bulan-</option>
                                        <?php foreach ($months as $month) : ?>
                                        <option value="<?= $month ?>"><?= $month ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    @error('bulan')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select class="form-control @error('tahun') is-invalid @enderror" required
                                        id="tahun" name="tahun">
                                        <option selected hidden value="">-Pilih Tahun-</option>
                                        <?php
                                        for ($i = 1990; $i <= date('Y'); $i++) {
                                            if (date('Y') == $i) {
                                                $select = 'selected';
                                            } else {
                                                $select = '';
                                            }
                                            echo '<option ' . $select . ' value="' . $i . '">' . $i . '</option>';
                                        } ?>
                                    </select>
                                    @error('tahun')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <div class="input-group">
                                <input type="file" required name="file"
                                    class="form-control @error('file') is-invalid @enderror"
                                    placeholder="Deskripsi {{ $title }}">
                                @error('file')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                data-action='submit'>Submit</button>
                            <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal lihat data -->
    <div class="modal fade" id="lihatdata" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul {{ $title }}</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="judul" id="judul" value=""
                                class="form-control" name="judul" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" required name="bulan" id="bulan" value=""
                                    class="form-control" name="bulan" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" required name="tahun" id="tahun" value=""
                                    class="form-control" name="tahun" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <div id="file" style="width: 100%; height: 500px"></div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                            data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.show').click(function() {
            $('#lihatdata').modal('show');
            $("#lihatdata").find("#id").attr("value", $(this).data('id'));
            $("#lihatdata").find("#judul").attr("value", $(this).data('judul'));
            $("#lihatdata").find("#bulan").attr("value", $(this).data('bulan'));
            $("#lihatdata").find("#tahun").attr("value", $(this).data('tahun'));
            // $("#lihatdata").find("#file").attr("value", $(this).data('file'));
            var file = "{{ url('/') }}/file/laporan/" + $(this).data('file');
            console.log(file);
            $('#file').html(`
                <iframe style="width: 100%; height: 100%" src="${file}" placeholder=""></iframe>
            `);
        });
    });
</script>
