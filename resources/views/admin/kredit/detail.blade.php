@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buka.kredit.list') }}">{{ $title }}</a></li>
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
                                                value="{{ $data_kredit->nik }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <div class="input-group">
                                            <input type="text" required name="no_hp" id="no_hp"
                                                value="{{ $data_kredit->no_hp }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto KTP</label>
                                        <div class="input-group">
                                            <input type="text" required name="foto_ktp" id="foto_ktp"
                                                value="{{ $data_kredit->foto_ktp }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <input type="text" required name="nama" id="nama"
                                                value="{{ $data_kredit->nama }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="text" required name="email" id="email"
                                                value="{{ $data_kredit->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <input type="text" required name="foto" id="foto"
                                                value="{{ $data_kredit->foto }}" class="form-control" readonly>
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
                                                value="{{ $data_kredit->provinsi }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="input-group">
                                            <input type="text" required name="kecamatan" id="kecamatan"
                                                value="{{ $data_kredit->kecamatan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten</label>
                                        <div class="input-group">
                                            <input type="text" required name="kab_kota" id="kab_kota"
                                                value="{{ $data_kredit->kab_kota }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan/Desa</label>
                                        <div class="input-group">
                                            <input type="text" required name="desa" id="desa"
                                                value="{{ $data_kredit->desa }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Detail Alamat</label>
                                        <div class="input-group">
                                            <input type="text" required name="alamat" id="alamat"
                                                value="{{ $data_kredit->alamat }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Produk & Pinjaman</h5><hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Produk</label>
                                        <div class="input-group">
                                            <input type="text" required name="produk_layanan" id="produk_layanan"
                                                value="{{ $data_kredit->produk_layanan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pinjaman</label>
                                        <div class="input-group">
                                            <input type="text" required name="jumlah_pinjaman" id="jumlah_pinjaman"
                                                value="{{ $data_kredit->jumlah_pinjaman }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Jaminan</label>
                                        <div class="input-group">
                                            <input type="text" required name="foto_jaminan" id="foto_jaminan"
                                                value="{{ $data_kredit->foto_jaminan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Waktu Terbaik Menghubungi Nasabah</label>
                                        <div class="input-group">
                                            <input type="text" required name="waktu" id="waktu"
                                                value="{{ $data_kredit->waktu }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Lama Pinjaman</label>
                                        <div class="input-group">
                                            <input type="text" required name="lama_pinjaman" id="lama_pinjaman"
                                                value="{{ $data_kredit->lama_pinjaman }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Rincian Jaminan</label>
                                        <div class="input-group">
                                            <input type="text" required name="rincian_jaminan" id="rincian_jaminan"
                                                value="{{ $data_kredit->rincian_jaminan }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('buka.kredit.list') }}">
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
