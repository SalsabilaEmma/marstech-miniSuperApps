@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $title }}</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>{{ $title }}</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section class="inner-page" data-aos="fade-up">
        <div class="container">
            @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-dismissible show fade">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('eror'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="section-header">
                <h2>{{ $title }}</h2>
                <p>Example inner page template</p>
            </div>
            <div id="accordion">
                <div class="card-header">
                    <h4 style="color:#3d6098;"><strong>3 Langkah mudah untuk pengajuan Deposito, Kredit, Deposito</strong>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button style="color:#3d6098;" class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1. Siapkan Dokumen Identitas Diri
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li>Pastikan foto KTP harus difoto secara langsung (bukan fotokopi KTP atau lainnya)
                                    </li>
                                    <li>Pastikan seluruh KTP tidak terpotong</li>
                                    <li>Pastikan foto dan data yang tertera pada KTP terbaca jelas (tidak blur, tidak
                                        tertutup jari, atau terkena pantulan cahaya)</li>
                                    <img src="https://e-pengajuan.bprdeltaartha.com/static/frontend/images/foto-ktp.jpeg"
                                        class="foto-ktp" alt="alternative">
                                    <li>Isikan nama lengkap sesuai KTP</li>
                                    <li>Isikan alamat jelas</li>
                                    <li>Isikan kontak (No. HP dan email yang aktif)</li>
                                    <li>Pastikan isian data adalah benar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button style="color:#3d6098;" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2. Verifikasi Data
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Staff kami akan menghubungi Anda sesuai kontak untuk melakukan verifikasi.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button style="color:#3d6098;" class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3. Validasi Pengajuan
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Penentuan akhir dari pengajuan anda
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 style="color:#3d6098;" class="text-center">Daftar Layanan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm text-center">
                            <h6 style="color:#3d6098;" class="text-center"><strong>Produk Tabungan</strong></h6>
                            @foreach ($data_tabungan as $tabungan)
                                <a class="btn btn-outline-dark btn-sm"
                                    href="{{ route('produk.tabungan', $tabungan->id) }}">{{ $tabungan->judul }}</a>
                            @endforeach
                        </div>
                        <div class="col-sm text-center">
                            <h6 style="color:#3d6098;" class="text-center"><strong>Produk Kredit</strong></h6>
                            @foreach ($data_kredit as $kredit)
                                <a class="btn btn-outline-dark btn-sm"
                                    href="{{ route('produk.kredit', $kredit->id) }}">{{ $kredit->judul }}</a>
                            @endforeach
                        </div>
                        <div class="col-sm text-center">
                            <h6 style="color:#3d6098;" class="text-center"><strong>Produk Deposito</strong></h6>
                            @foreach ($data_deposito as $deposito)
                                <a class="btn btn-outline-dark btn-sm"
                                    href="{{ route('produk.deposito', $deposito->id) }}">{{ $deposito->judul }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container">
            <form action="{{ route('buka.deposito.store') }}" method="POST" enctype="multipart/form-data" id="recaptcha-form">
                {{ csrf_field() }}
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Data Pribadi</strong></h4>
                        <div class="form-group mt-3">
                            <label>NIK</label>
                            <input required name="nik" value="" type="number" class="form-control" id="nik"
                                placeholder="Masukkan NIK Sesuai KTP">
                        </div>
                        <div class="form-group mt-3">
                            <label>Nama Lengkap</label>
                            <input required name="nama" value="" type="text" class="form-control" id="nama"
                                placeholder="Masukkan Nama Lengkap Sesuai KTP">
                        </div>
                        <div class="form-group mt-3">
                            <label>No HP Aktif</label>
                            <input required name="no_hp" value="" type="text" class="form-control"
                                id="no_hp" placeholder="Masukkan No HP AKtif">
                        </div>
                        <div class="form-group mt-3">
                            <label>Email Aktif</label>
                            <input required name="email" value="" type="email" class="form-control"
                                id="email" placeholder="Masukkan Email Aktif">
                        </div>
                        <div class="form-group mt-3">
                            <label>Foto</label>
                            <input required name="foto" type="file" class="form-control" id="foto" accept="image/*" id="file-input"
                            onchange="imageExtensionValidate(this)">
                        </div>
                        <div class="form-group mt-3">
                            <label>Foto KTP</label>
                            <input required name="foto_ktp" type="file" class="form-control" id="foto_ktp" accept="image/*" id="file-input"
                            onchange="imageExtensionValidate(this)">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Alamat</strong></h4>
                        <div class="form-group mt-3">
                            <label> </label>
                            <select name="provinsi" value="" class="form-control" id="provinsi"></select>
                        </div>
                        <div class="form-group mt-3">
                            <select name="kab_kota" value="" class="form-control" id="distrik">
                                <option hidden value="">- Pilih Kota / Kabupaten -</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <select name="kecamatan" value="" class="form-control" id="kecamatan">
                                <option selected hidden value="">- Pilih Kecamatan -</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <select name="desa" value="" class="form-control" id="desa">
                                <option selected hidden value="">- Pilih Kelurahan / Desa -</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <textarea name="alamat" value="" class="form-control" id="alamat" rows="3"
                                placeholder="Detail Alamat (Kecamatan, Desa, Nomor dll)"></textarea>
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Pilih Produk</strong></h4>
                        <div class="form-group mt-3">
                            <label> </label>
                            <select name="produk_layanan" class="form-control" id="produk_layanan">
                                <option selected hidden value="">- Produk Layanan -</option>
                                <?php
                                if ($title == 'Buka Tabungan') {
                                    foreach ($data_tabungan as $tabungan) {
                                        echo '<option value="' . $tabungan->judul . '">' . $tabungan->judul . '</option>';
                                    }
                                } elseif ($title == 'Buka Deposito') {
                                    foreach ($data_deposito as $deposito) {
                                        echo '<option value="' . $deposito->judul . '">' . $deposito->judul . '</option>';
                                    }
                                } else {
                                    foreach ($data_kredit as $kredit) {
                                        echo '<option value="' . $kredit->judul . '">' . $kredit->judul . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <p>Dengan klik {{ $title }} maka Petugas kami dapat segera membantu Anda untuk melakukan
                                Pembukaan Deposito di BPR. Punya Ciki</p>
                        </div>
                        <div class="form-group mt-3 text-right">
                            {{-- <div class="text-center" data-sitekey=""></div><br> --}}
                            <button type="submit" class="btn btn-primary g-recaptcha"
                                data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                data-action='submit'>Kirim</button><br>
                        </div>
                    </div>
                </div>
            </form>
        </div><br>
    </section>
@endsection
