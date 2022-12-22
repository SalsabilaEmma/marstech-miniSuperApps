@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buka.tabungan.list') }}">{{ $title }}</a></li>
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
                            <h5>Data Pribadi</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <div class="input-group">
                                            <input type="text" required name="nik" id="nik"
                                                value="{{ $data_tabungan->nik }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <div class="input-group">
                                            <input type="text" required name="no_hp" id="no_hp"
                                                value="{{ $data_tabungan->no_hp }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto KTP</label>
                                        <div class="input-group">
                                            <div class="zoom">
                                                <img id="file" class="profile-user-img img-responsive"
                                                    style="height: 150px; width: auto; display: block; margin: auto;"
                                                    src="{{ url('image/buka-tabungan/' . $data_tabungan->nama . '/' . $data_tabungan->foto_ktp) }}">
                                            </div>
                                            {{-- <input type="text" required name="foto_ktp" id="foto_ktp"
                                                value="{{ $data_tabungan->foto_ktp }}" class="form-control" readonly> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <input type="text" required name="nama" id="nama"
                                                value="{{ $data_tabungan->nama }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" required name="email" id="email"
                                                value="{{ $data_tabungan->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="zoom">
                                                <img id="file" class="profile-user-img img-responsive"
                                                    style="height: 150px; width: auto; display: block; margin: auto;"
                                                    src="{{ url('image/buka-tabungan/' . $data_tabungan->nama . '/' . $data_tabungan->foto) }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Alamat</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <input type="text" required name="provinsi" id="provinsi"
                                                value="{{ $data_tabungan->provinsi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="input-group">
                                            <input type="text" required name="kecamatan" id="kecamatan"
                                                value="{{ $data_tabungan->kecamatan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten</label>
                                        <div class="input-group">
                                            <input type="text" required name="kab_kota" id="kab_kota"
                                                value="{{ $data_tabungan->kab_kota }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan/Desa</label>
                                        <div class="input-group">
                                            <input type="text" required name="desa" id="desa"
                                                value="{{ $data_tabungan->desa }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Detail Alamat</label>
                                        <div class="input-group">
                                            <input type="text" required name="alamat" id="alamat"
                                                value="{{ $data_tabungan->alamat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Produk Layanan</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <div class="input-group">
                                            <input type="text" required name="produk_layanan" id="produk_layanan"
                                                value="{{ $data_tabungan->produk_layanan }}" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('buka.tabungan.list') }}">
                                    <button type="button"
                                        class="btn btn-outline-dark m-t-15 waves-effect">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
