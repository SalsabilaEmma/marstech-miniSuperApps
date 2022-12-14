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
                                                <th>Tanggal</th>
                                                <th style="width: 215px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_lelang as $lelang)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $lelang->judul }}</td>
                                                    <td>{{ date('d F Y', strtotime($lelang->tanggal)) }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('lelang.destroy', $lelang->id) }}"
                                                            method="POST">
                                                            <button type="button" class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $lelang->id }}"
                                                                data-judul="{{ $lelang->judul }}"
                                                                data-kode_aset="{{ $lelang->kode_aset }}"
                                                                data-harga="Rp. {{ number_format($lelang->harga, 2) }},-"
                                                                data-lokasi="{{ $lelang->lokasi }}"
                                                                data-tanggal="{{ date('d F Y', strtotime($lelang->tanggal)) }}"
                                                                data-no_telp="{{ $lelang->no_telp }}"
                                                                data-detail="{{ $lelang->detail }}"
                                                                data-foto="{{ $lelang->gambar }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button>
                                                            <a href="{{ route('lelang.edit', $lelang->id) }}"
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
                    <form action="{{ route('lelang.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Judul {{ $title }}</label>
                                    <div class="input-group">
                                        <input type="text" required
                                            class="form-control @error('judul') is-invalid @enderror"
                                            placeholder="Judul {{ $title }}" name="judul">
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Aset</label>
                                    <div class="input-group">
                                        <input type="text" required
                                            class="form-control @error('kode_aset') is-invalid @enderror"
                                            placeholder="Kode Aset" name="kode_aset">
                                        @error('kode_aset')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <div class="input-group">
                                        <input type="text" required
                                            class="form-control @error('lokasi') is-invalid @enderror" placeholder="Lokasi"
                                            name="lokasi">
                                        @error('lokasi')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <span class="mytooltip tooltip-effect-1">
                                        <span class="tooltip-item" style="font-size: 8pt;">Masukkan alamat sesuai yang
                                            tertera pada Gmaps</span>
                                        <span class="tooltip-content clearfix x">
                                            <img class="zoom text-center"
                                                src="https://tunasarthabaru.co.id/image/petunjuk.jpeg">
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <div class="input-group">
                                        <input type="number" required
                                            class="form-control @error('harga') is-invalid @enderror" placeholder="Harga"
                                            name="harga">
                                        @error('harga')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <input type="date" required
                                            class="form-control @error('tanggal') is-invalid @enderror"
                                            placeholder="Tanggal" name="tanggal">
                                        @error('tanggal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <div class="input-group">
                                        <input type="text" required
                                            class="form-control @error('no_telp') is-invalid @enderror"
                                            placeholder="No Telepon" name="no_telp">
                                        @error('no_telp')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <p style="font-size: 8pt;">Nomor diawali dengan 62 (= 0), contoh : 6281234567890</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <div class="input-group">
                                <textarea name="detail" class="summernote form-control @error('detail') is-invalid @enderror" placeholder="Detail"></textarea>
                                @error('detail')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>File</label>
                            <div class="input-group">
                                <input type="file" required name="file"
                                    class="form-control @error('file') is-invalid @enderror"
                                    placeholder="Deskripsi {{ $title }}">
                                @error('file')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>File</label>
                            <div id="inputFormRow">
                                <div class="input-group">
                                    <input type="file" required name="foto[]" autocomplete="off"
                                        class="m-input form-control @error('foto') is-invalid @enderror" placeholder=""
                                        accept="image/*" id="file-input" onchange="imageExtensionValidate(this)">
                                    @error('foto')
                                        <small>{{ $message }}</small>
                                    @enderror
                                    <div class="input-group-append">
                                        <button id="removeRow" type=""
                                            class="btn btn-outline-danger btn-sm fa fa-trash"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-success m-t-15 waves-effect">+ Tambah
                            Baris</button>
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
    {{-- <?= $l['id_laporan'] ?> --}}
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Judul {{ $title }}</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="judul" id="judul" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kode Aset</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="kode_aset" id="kode_aset" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="harga" id="harga" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="lokasi" id="lokasi" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="tanggal" id="tanggal" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="no_telp" id="no_telp" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        {{-- <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="detail" id="detail" value=""
                                class="summernote form-control" readonly>
                        </div> --}}
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="detail" id="detail" value=""
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="gallery gallery-md">
                            <div class="zoom3">
                                <input type="hidden" name="id" id="id">
                                <div name="foto" id="foto" data-title="Image" value=""></div>
                            </div>
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
    {{-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // add row
        $("#addRow").click(function() {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group">';
            html +=
                '<input type="file" name="foto[]" class="form-control m-input" autocomplete="off" accept="image/*" id="file-input" onchange="imageExtensionValidate(this)">';
            //
            html += '<div class="input-group-append">';
            html +=
                '<button id="removeRow" type="button" class="btn btn-outline-danger btn-sm fa fa-trash"></button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.show').click(function() {
                $("#foto").empty();
                $('#lihatdata').modal('show');
                $("#lihatdata").find("#id").attr("value", $(this).data('id'));
                $("#lihatdata").find("#judul").attr("value", $(this).data('judul'));
                $("#lihatdata").find("#kode_aset").attr("value", $(this).data('kode_aset'));
                $("#lihatdata").find("#harga").attr("value", $(this).data('harga'));
                $("#lihatdata").find("#lokasi").attr("value", $(this).data('lokasi'));
                $("#lihatdata").find("#tanggal").attr("value", $(this).data('tanggal'));
                $("#lihatdata").find("#no_telp").attr("value", $(this).data('no_telp'));
                // $("#lihatdata").find("#detail").attr("value", $(this).data('detail'));
                $("#lihatdata").find("#foto").attr("value", $(this).data('foto'));
                $('#detail').summernote('code', ($(this).data('detail')));

                // Tampilin Gambar dari tabel lain yg berelasi
                var fileFoto = $(this).data('foto');
                let text = "";
                for (let i = 0; i < fileFoto.length; i++) {
                    console.log(fileFoto[i].gambar);
                    var foto = "<?php url(); ?>/image/lelang/" + fileFoto[i].gambar;
                    var img = document.createElement("img");
                    img.style = "width: 10rem; padding-right:1rem";
                    // img.class = "zoom3";
                    img.src = "<?php url(); ?>/image/lelang/" + fileFoto[i].gambar;
                    var src = document.getElementById("foto");
                    src.appendChild(img);
                }
            });
        });
    </script>
@endsection
