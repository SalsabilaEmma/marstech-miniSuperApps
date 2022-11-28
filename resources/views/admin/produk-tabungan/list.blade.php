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
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px">No</th>
                                                <th>Judul</th>
                                                <th style="width: 215px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_tabungan as $tabungan)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $tabungan->judul }}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('produk.tabungan.destroy', $tabungan->id) }}"
                                                            method="POST">
                                                            <button type="button" class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $tabungan->id }}"
                                                                data-judul="{{ $tabungan->judul }}"
                                                                data-isi="{{ $tabungan->isi }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button>
                                                            {{-- <button type="button"
                                                                class="ubah btn btn-sm btn-outline-success"
                                                                data-id="{{ $tabungan->id }}"
                                                                data-judul="{{ $tabungan->judul }}"
                                                                data-isi="{{ $tabungan->isi }}" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i data-feather="edit"></i>
                                                            </button> --}}
                                                            <a href="{{ route('produk.tabungan.edit', $tabungan->id) }}"
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
                    <form action="{{ route('produk.tabungan.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Judul {{ $title }}</label>
                            <div class="input-group">
                                <input type="text" required class="form-control @error('judul') is-invalid @enderror"
                                    placeholder="Judul Produk Tabungan" name="judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div class="input-group">
                                {{-- <textarea name="isi" class="summernote @error('isi') is-invalid @enderror" placeholder="Deskripsi Produk Tabungan"></textarea>
                                @error('isi')
                                    <small>{{ $message }}</small>
                                @enderror --}}
                                <input type="text" required name="isi" class="form-control @error('isi') is-invalid @enderror"
                                    placeholder="Deskripsi Produk Tabungan">
                                @error('isi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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
    <!-- Modal lihat data -->
    <div class="modal fade" id="lihatdata" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <input type="text" required name="judul" id="judul" value="" class="form-control"
                                name="judul" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="isi" id="isi" value="" class="form-control"
                                name="isi" readonly>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label>Dibuat</label>
                        <div class="input-group">
                            <input type="hidden" name="id" id="id">
                            <input type="text" required name="created_at" id="created_at" value="" class="form-control"
                            readonly>
                        </div>
                    </div> --}}
                    <div class="text-right">
                        <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                            data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit data -->
    {{-- <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail Produk Tabungan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('produk.tabungan.edit') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul Produk</label>
                            <div class="input-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" required name="judul" id="judul" value=""
                                    class="form-control @error('judul') is-invalid @enderror" name="judul">
                                @error('judul')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <div class="input-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" required name="isi" id="isi" value=""
                                    class="form-control @error('isi') is-invalid @enderror" name="isi">
                                @error('isi')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Submit</button>
                            <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.show').click(function() {
            $('#lihatdata').modal('show');
            $("#lihatdata").find("#id").attr("value", $(this).data('id'));
            $("#lihatdata").find("#judul").attr("value", $(this).data('judul'));
            $("#lihatdata").find("#isi").attr("value", $(this).data('isi'));
            // $("#lihatdata").find("#created_at").attr("value", $(this).data('created_at'));
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
        $('.ubah').click(function() {
            $('#editdata').modal('ubah');
            $("#editdata").find("#id").attr("value", $(this).data('id'));
            $("#editdata").find("#judul").attr("value", $(this).data('judul'));
            $("#editdata").find("#isi").attr("value", $(this).data('isi'));
        });
    });
</script> --}}
