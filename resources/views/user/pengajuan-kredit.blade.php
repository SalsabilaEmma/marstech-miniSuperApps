@extends('user.layout.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengajuan Kredit</h2>
                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Pengajuan Kredit</li>
                </ol>
            </div>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section class="inner-page" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2>Pengajuan Kredit</h2>
                <p>Example inner page template</p>
            </div>
            <div id="accordion">
                <div class="card-header">
                    <h4 style="color:#3d6098;"><strong>3 Langkah mudah untuk pengajuan Tabungan, Kredit, Deposito</strong>
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
                            {{-- <?php foreach ($tabungan as $kt => $vt) { ?>
                            <a class="btn btn-outline-dark btn-sm" href="<?php echo site_url('tabungan/show/') . $vt->id_tabungan; ?>"><?php echo $vt->judul; ?></a>
                            <?php } ?> --}}
                        </div>
                        <div class="col-sm text-center">
                            <h6 style="color:#3d6098;" class="text-center"><strong>Produk Kredit</strong></h6>
                            {{-- <?php foreach ($pembiayaan as $kk => $vk) { ?>
                            <a class="btn btn-outline-dark btn-sm" href="<?php echo site_url('pembiayaan/show/') . $vk->id_pembiayaan; ?>"><?php echo $vk->judul; ?></a>
                            <?php } ?> --}}
                        </div>
                        <div class="col-sm text-center">
                            <h6 style="color:#3d6098;" class="text-center"><strong>Produk Deposito</strong></h6>
                            {{-- <?php foreach ($deposito as $kd => $vd) { ?>
                            <a class="btn btn-outline-dark btn-sm" href="<?php echo site_url('deposito/show/') . $vd->id_deposito; ?>"><?php echo $vd->judul; ?></a>
                            <?php } ?> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container">
            <form id="postForm" enctype="multipart/form-data" action="" method="post">
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Data Pribadi</strong></h4>
                        <!--   -->
                        <div class="form-group">
                            <label>NIK</label>
                            <input required name="nik" value="" type="number" class="form-control" id="nik"
                                placeholder="Masukkan NIK Sesuai KTP">
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input required name="nama" value="" type="text" class="form-control" id="nama"
                                placeholder="Masukkan Nama Lengkap Sesuai KTP">
                        </div>
                        <div class="form-group">
                            <label>No HP Aktif</label>
                            <input required name="no_hp" value="" type="text" class="form-control"
                                id="no_hp" placeholder="Masukkan No HP AKtif">
                        </div>
                        <div class="form-group">
                            <label>Email Aktif</label>
                            <input required name="email" value="" type="email" class="form-control"
                                id="email" placeholder="Masukkan Email Aktif">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input required name="foto" type="file" class="form-control" id="foto">
                        </div>
                        <div class="form-group">
                            <label>Foto KTP</label>
                            <input required name="foto_ktp" type="file" class="form-control" id="foto_ktp">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Alamat</strong></h4>
                        <div class="form-group">
                            <label> </label>
                            <select name="provinsi" value="" class="form-control" id="provinsi"></select>
                        </div>
                        <div class="form-group">
                            <select name="kab_kota" value="" class="form-control" id="distrik">
                                <option hidden value="">- Pilih Kota / Kabupaten -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="kecamatan" value="" class="form-control" id="kecamatan">
                                <option selected hidden value="">- Pilih Kecamatan -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="desa" value="" class="form-control" id="desa">
                                <option selected hidden value="">- Pilih Kelurahan / Desa -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" value="" class="form-control" id="alamat" rows="3"
                                placeholder="Detail Alamat (Kecamatan, Desa, Nomor dll)"></textarea>
                        </div>
                        <div class="form-group">
                            <h4 style="color:#484a46;"><strong>Waktu Terbaik Menghubungi Anda :</strong></h4>
                            <select  id="waktu" value="" name="waktu" class="form-control">
                                <option value="09.00 - 11.00 WIB" style="color: black;">09.00 - 11.00 WIB</option>
                                <option value="13.00 - 15.00 WIB" style="color: black;">13.00 - 15.00 WIB</option>
                                <option value="15.00 - 17.00 WIB" style="color: black;">15.00 - 17.00 WIB</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4 style="color:#484a46;"><strong>Pilih Produk</strong></h4>
                        <div class="form-group">
                            <label> </label>
                            <select name="produk_layanan" class="form-control" id="produk_layanan">
                                <option selected hidden value="">- Produk Layanan -</option>
                            </select>
                        </div>

                        <h4 style="color:#484a46;"><strong>Pinjaman</strong></h4>
                        <div class="form-group">
                            <label>Jumlah Pinjaman</label>
                            <input required name="jumlah_pinjaman" value="" type="number" class="form-control"
                                id="jumlah_pinjaman" placeholder="Masukkan Jumlah Pinjaman">
                        </div>
                        <div class="form-group">
                            <label>Lama Pinjaman (Bulan)</label>
                            <input required name="lama_pinjaman" value="" type="number" class="form-control"
                                id="lama_pinjaman" placeholder="Masukkan Lama Pinjaman (Bulan)">
                        </div>
                        <div class="form-group">
                            <label>Rincian Jaminan</label>
                            <textarea name="rincian_jaminan" value="" class="form-control" id="rincian_jaminan" rows="3"
                                placeholder="Contoh Nama Jalan/Gang, Nomor Rumah, Detail Barang dll"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Jaminan</label>
                            <input required name="foto_jaminan" value="" type="file" class="form-control"
                                id="foto_jaminan">
                        </div>
                        <div class="form-group">
                            <p>Dengan klik Pengajuan Kredit maka Petugas kami dapat segera membantu Anda untuk melakukan
                                Pengajuan Kredit di BPR. Punya Ciki</p>
                        </div>
                        <div class="form-group text-right">
                            <div class="g-recaptcha text-center" data-sitekey=""></div><br>
                            <button type="submit" class="btn btn-primary">Kirim</button><br>
                        </div>
                    </div>
                </div>
            </form>
        </div><br>
    </section>
@endsection
