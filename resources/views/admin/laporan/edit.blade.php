@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('laporan.list') }}">{{ $title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $title }}</li>
            </ol>
        </nav>
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.update', $data_laporan->id) }}" method="POST" id="recaptcha-form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <div class="input-group">
                                        <input type="text" required name="judul" id="judul"
                                            value="{{ $data_laporan->judul }}"
                                            class="form-control @error('judul') is-invalid @enderror"><br>
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bulan">Bulan</label>
                                            <select class="form-control @error('bulan') is-invalid @enderror" required
                                                name="bulan" id="bulan">
                                                <?php
                                                $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                ?>
                                                <option selected hidden value="">{{ $data_laporan->bulan }}</option>
                                                <?php foreach ($months as $month) : ?>
                                                <option value="<?= $month ?>"><?= $month ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            @error('bulan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-control @error('tahun') is-invalid @enderror" required
                                                id="tahun" name="tahun">
                                                <option selected hidden value="">{{ $data_laporan->tahun }}</option>
                                                <?php
                                                for ($i = 1990; $i <= date('Y'); $i++) {
                                                    if (date('Y') == $i) {
                                                        $select = 'selected';
                                                    } else {
                                                        $select = '';
                                                    }
                                                    // echo '<option value="">' . $data_laporan->tahun . '</option>';
                                                    echo '<option ' . $select . ' value="' . $i . '">' . $i . '</option>';
                                                } ?>
                                            </select>
                                            @error('tahun')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File {{ $title }}</label>
                                    <div class="input-group">
                                        <input type="file" required name="file" id="file" autocomplete="off"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Preview File Lama</label>
                                    <div class="input-group">
                                        <iframe style="width: 100%; height: 300px"
                                            src="{{ url('file/laporan/' . $data_laporan->file) }}" placeholder=""></iframe>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                        data-action='submit'>Ubah</button>
                                    <a href="{{ route('laporan.list') }}">
                                        <button type="button"
                                            class="btn btn-outline-dark m-t-15 waves-effect">Kembali</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
