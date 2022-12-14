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
                                                <th style="width: 250px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_karir as $karir)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $karir->judul }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('karir.destroy', $karir->id) }}"
                                                            method="POST">
                                                            <button type="button" class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $karir->id }}"
                                                                data-judul="{{ $karir->judul }}"
                                                                data-isi="{{ $karir->isi }}"
                                                                data-tglmax="{{ $karir->tglmax }}"
                                                                data-file="{{ $karir->file }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button>
                                                            <a href="{{ route('karir.edit', $karir->id) }}"
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
                    <form action="{{ route('karir.store') }}" method="POST" id="recaptcha-form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Judul {{ $title }}</label>
                            <div class="input-group">
                                <input type="text" required class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Judul Karir" name="judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Batas Waktu</label>
                            <div class="input-group">
                                <input type="date" required class="form-control @error('tglmax') is-invalid @enderror"
                                    placeholder="" name="tglmax">
                                @error('tglmax')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <div class="input-group">
                                <input type="file" required name="file" accept="image/*" id="file-input"
                                    onchange="imageExtensionValidate(this)"
                                    class="form-control @error('file') is-invalid @enderror" placeholder="Deskripsi Karir">
                                @error('file')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div class="input-group">
                                <textarea required name="isi" class="summernote form-control @error('isi') is-invalid @enderror"
                                    placeholder="Deskripsi {{ $title }}"></textarea>
                                @error('isi')
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
                    <div class="form-group">
                        <label>Batas Waktu</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="tglmax" id="tglmax" value=""
                                class="form-control" name="tglmax" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="isi" id="isi" value=""
                                class="form-control" name="isi" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="gallery gallery-md">
                            <input type="hidden" name="id" id="id">
                            <div name="file" class="zoom3" id="file" data-title="Image"></div>
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
            $("#lihatdata").find("#tglmax").attr("value", $(this).data('tglmax'));
            $("#lihatdata").find("#file").attr("value", $(this).data('file'));
            $('#isi').summernote('code', ($(this).data('isi')));

            var fileFoto = "{{ url('/') }}/image/pengumuman-karir/" + $(this).data('file');
            console.log(fileFoto);
            $('#file').html(`
                <img id="file" class="profile-user-img img-responsive" style="height: 150px; width: auto; display: block; margin: auto;" src="${fileFoto}" alt="Karir">
            `);

            // var foto = "<?php url(); ?>/image/pengumuman-karir/" + fileFoto;
            // var img = document.createElement("img");
            // img.style = "width: 10rem; padding-right:1rem";
            // // img.class = "zoom3";
            // img.src = "<?php url(); ?>/image/pengumuman-karir/" + fileFoto;
            // var src = document.getElementById("foto");
            // src.appendChild(img);
        });
    });
</script>
