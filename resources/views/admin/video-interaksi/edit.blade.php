@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('video.interaksi.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('video.interaksi.update', $data_video_interaksi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <div class="input-group">
                                        <input type="text" required name="judul" id="judul"
                                            value="{{ $data_video_interaksi->judul }}"
                                            class="form-control @error('judul') is-invalid @enderror"><br>
                                        @error('judul')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Link Video Interaksi</label>
                                    <div class="input-group">
                                        <input type="text" required name="link" id="link"
                                            class="form-control @error('link') is-invalid @enderror" value="{{ $data_video_interaksi->link }}">
                                        @error('link')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Preview</label>
                                    <div class="input-group">
                                        <div class="embed-responsive embed-responsive-16by9 box-shadow wow fadeInUp"
                                            data-wow-delay="200ms">
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/{{ explode('v=', $data_video_interaksi->link)[1] }}" style="height: 200px; width: auto;"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Ubah</button>
                                    <a href="{{ route('video.interaksi.list') }}">
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
