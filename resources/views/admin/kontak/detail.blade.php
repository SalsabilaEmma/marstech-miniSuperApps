@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kontak.list') }}">{{ $title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail {{ $title }}</li>
            </ol>
        </nav>
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <input type="text" required name="nama" id="nama"
                                                value="{{ $data_kontak->nama }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subjek</label>
                                        <div class="input-group">
                                            <input type="text" required name="subjek" id="subjek"
                                                value="{{ $data_kontak->subjek }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" required name="email" id="email"
                                                value="{{ $data_kontak->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="input-group">
                                            <input type="text" required name="alamat" id="alamat"
                                                value="{{ $data_kontak->alamat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Isi Pesan</label>
                                        <div class="input-group">
                                            <input type="text" required name="isi" id="isi"
                                                value="{{ $data_kontak->isi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('kontak.list') }}">
                                    <button type="button" class="btn btn-outline-dark m-t-15 waves-effect">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
