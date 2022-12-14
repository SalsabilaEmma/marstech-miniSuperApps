@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('footer.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('footer.update', $data_footer->id) }}" method="POST" id="recaptcha-form"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id" id="id">
                                                <input type="text" id="email" value="{{ $data_footer->email }}"
                                                    required class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="email" name="email">
                                                @error('email')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id" id="id">
                                                <input type="text" id="no_telp" value="{{ $data_footer->no_telp }}"
                                                    required class="form-control @error('no_telp') is-invalid @enderror"
                                                    placeholder="No Telepon" name="no_telp">
                                                @error('no_telp')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" id="lokasi" value="{{ $data_footer->lokasi }}" required
                                            class="form-control @error('lokasi') is-invalid @enderror" placeholder="lokasi"
                                            name="lokasi">
                                        @error('lokasi')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id" id="id">
                                        <textarea type="text" id="alamat_lengkap" name="alamat_lengkap" value="{{ $data_footer->alamat_lengkap }}" required
                                            class="form-control @error('alamat_lengkap') is-invalid @enderror" placeholder="Alamat Lengkap">{{ $data_footer->alamat_lengkap }}</textarea>
                                        @error('alamat_lengkap')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Isi</label>
                                    <div class="input-group">
                                        <textarea type="text" required name="isi" id="isi" value="{{ $data_footer->isi }}" required
                                            class="form-control @error('isi') is-invalid @enderror">{{ $data_footer->isi }}</textarea>
                                        @error('isi')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                        data-action='submit'>Ubah</button>
                                    <a href="{{ route('footer.list') }}">
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
