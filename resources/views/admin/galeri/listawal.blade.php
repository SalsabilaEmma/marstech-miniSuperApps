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
                                            @foreach ($data_galeri as $galeri)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $galeri->judul }}</td>
                                                    <td>{{ date('d F Y', strtotime($galeri->tanggal)) }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('galeri.destroy', $galeri->id) }}"
                                                            method="POST">
                                                            <button type="button" class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $galeri->id }}"
                                                                data-judul="{{ $galeri->judul }}"
                                                                data-foto="{{ $galeri->gambar }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button>
                                                            <a href="{{ route('galeri.edit', $galeri->id) }}"
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
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
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
                            </div>
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-success m-t-15 waves-effect">+ Tambah
                            Baris</button>
                        <div class="text-right">
                            <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Submit</button>
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Judul {{ $title }}</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" required name="judul" id="judul" value=""
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="gallery gallery-md">
                                    <input type="hidden" name="id" id="id">
                                    <div name="foto" class="zoom3" id="foto" data-title="Image"></div>
                                </div>
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
                // $("#lihatdata").find("#detail").attr("value", $(this).data('detail'));
                $("#lihatdata").find("#foto").attr("value", $(this).data('foto'));
                $('#detail').summernote('code', ($(this).data('detail')));

                // Tampilin Gambar dari tabel lain yg berelasi
                var fileFoto = $(this).data('foto');
                let text = "";
                for (let i = 0; i < fileFoto.length; i++) {
                    console.log(fileFoto[i].gambar);
                    var foto = "<?php url(); ?>/image/galeri/" + fileFoto[i].gambar;
                    var img = document.createElement("img");
                    img.style = "width: 10rem; padding-right:1rem";
                    // img.class = "zoom3";
                    img.src = "<?php url(); ?>/image/galeri/" + fileFoto[i].gambar;
                    var src = document.getElementById("foto");
                    src.appendChild(img);
                }
            });
        });
    </script>
@endsection
