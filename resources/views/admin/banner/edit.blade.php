@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('banner.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('banner.update', $data_banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <div class="input-group">
                                        <input type="text" required name="nama" id="nama" value="{{ $data_banner->nama }}"
                                            class="form-control @error('nama') is-invalid @enderror"><br>
                                        @error('nama')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <div class="input-group">
                                        <input type="text" required name="ket" id="ket" value="{{ $data_banner->ket }}"
                                            class="form-control @error('ket') is-invalid @enderror"><br>
                                        @error('ket')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gambar Banner</label>
                                    <div class="input-group">
                                        <input type="file" required name="file" id="file" autocomplete="off" accept="image/*" id="file-input" onchange="imageExtensionValidate(this)"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Preview File Lama</label>
                                    <div class="input-group">
                                        <div class="zoom">
                                            <img id="file" class="profile-user-img img-responsive"
                                                style="height: 150px; width: auto; display: block; margin: auto;"
                                                src="{{ url('image/banner/' . $data_banner->file) }}" alt="Banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Ubah</button>
                                    <a href="{{ route('banner.list') }}">
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
