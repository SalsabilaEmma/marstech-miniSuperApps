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
                                {{-- <div style="padding-left: 25px">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#tambahdata">Tambah Data</button>
                                </div><br> --}}
                                <div class="table-responsive">
                                    <table class="table table-striped" id="save-stage" style="width:100%;">
                                        {{--  id="save-stage myTable" --}}
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px">No</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Nama</th>
                                                <th>Produk Layanan</th>
                                                <th style="width: 250px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_tabungan as $tabungan)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ date('d F Y', strtotime($tabungan->created_at)) }}</td>
                                                    <td>{{ $tabungan->nama }}</td>
                                                    <td>{{ $tabungan->produk_layanan}}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('buka.tabungan.destroy', $tabungan->id) }}"
                                                            method="POST">
                                                            {{-- <button type="button"
                                                                class="show btn btn-sm btn-outline-info"
                                                                data-id="{{ $tabungan->id }}"
                                                                data-nama="{{ $tabungan->nama }}"
                                                                data-produk_layanan="{{ $tabungan->produk_layanan }}">
                                                                <i data-feather="info"></i> Detail
                                                            </button> --}}
                                                            <a href="{{ route('buka.tabungan.detail', $tabungan->id) }}"
                                                                class="btn btn-sm btn-outline-info">
                                                                <i data-feather="info"></i> Detail
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

@endsection
