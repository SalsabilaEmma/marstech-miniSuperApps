@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buka.deposito.list') }}">{{ $title }}</a></li>
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
                            <h5>Data Pribadi</h5><hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <div class="input-group">
                                            <input type="text" required name="nik" id="nik"
                                                value="{{ $data_deposito->nik }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <div class="input-group">
                                            <input type="text" required name="no_hp" id="no_hp"
                                                value="{{ $data_deposito->no_hp }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto KTP</label>
                                        <div class="input-group">
                                            <input type="text" required name="foto_ktp" id="foto_ktp"
                                                value="{{ $data_deposito->foto_ktp }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <input type="text" required name="nama" id="nama"
                                                value="{{ $data_deposito->nama }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" required name="email" id="email"
                                                value="{{ $data_deposito->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <input type="text" required name="foto" id="foto"
                                                value="{{ $data_deposito->foto }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Alamat</h5><hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <input type="text" required name="provinsi" id="provinsi"
                                                value="{{ $data_deposito->provinsi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="input-group">
                                            <input type="text" required name="kecamatan" id="kecamatan"
                                                value="{{ $data_deposito->kecamatan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten</label>
                                        <div class="input-group">
                                            <input type="text" required name="kab_kota" id="kab_kota"
                                                value="{{ $data_deposito->kab_kota }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan/Desa</label>
                                        <div class="input-group">
                                            <input type="text" required name="desa" id="desa"
                                                value="{{ $data_deposito->desa }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Detail Alamat</label>
                                        <div class="input-group">
                                            <input type="text" required name="alamat" id="alamat"
                                                value="{{ $data_deposito->alamat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Produk Layanan</h5><hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <div class="input-group">
                                            <input type="text" required name="produk_layanan" id="produk_layanan"
                                                value="{{ $data_deposito->produk_layanan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('buka.deposito.list') }}">
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
