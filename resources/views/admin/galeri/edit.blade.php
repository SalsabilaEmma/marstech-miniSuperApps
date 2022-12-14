@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('galeri.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('galeri.update', $data_galeri->id) }}" method="POST" id="recaptcha-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Judul {{ $title }}</label>
                                            <div class="input-group">
                                                <input type="text" required name="judul" id="judul"
                                                    value="{{ $data_galeri->judul }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>File Gambar Baru</label>
                                            <div class="input-group">
                                                <input type="file" required name="file" autocomplete="off"
                                                    autocomplete="off" accept="image/*" id="file-input"
                                                    onchange="imageExtensionValidate(this)"
                                                    class="m-input form-control @error('foto') is-invalid @enderror"
                                                    placeholder="">
                                                @error('foto')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Preview Gambar</label>
                                            <div class="row">
                                                {{-- @foreach ($data_galeri->gambar as $gambar) --}}
                                                <div class="col-md-4">
                                                    <div class="input-group" id="gambar-{{ $data_galeri->id }}">
                                                        <div class="zoom">
                                                            <img id="file" class="profile-user-img img-responsive"
                                                                style="height: 80px; width: auto; display: block; margin: auto;"
                                                                src="{{ url('image/galeri/' . $data_galeri->file) }}"
                                                                alt="Gambar Lelang">
                                                        </div>
                                                        {{-- <div class="input-group-append">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm fa fa-trash hapus"
                                                                    data-url="{{ route('galeri.delete', $data_galeri->id) }}"></button>
                                                            </div> --}}

                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                            </div>
                                        </div>
                                        {{-- <hr><label>Tambah Data Gambar</label>
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-success m-t-15 waves-effect">+
                                            Tambah
                                            Baris</button> --}}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect g-recaptcha"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                        data-action='submit'>Ubah</button>
                                    <a href="{{ route('galeri.list') }}">
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
    {{-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // add row
        $("#addRow").click(function() {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group">';
            html +=
                '<input type="file" name="foto[]" class="form-control m-input" autocomplete="off" accept="image/*" id="file-input" onchange="imageExtensionValidate(this)" required>';
            html += '<div class="input-group-append">';
            html +=
                '<button id="removeRow" type="button" class="btn btn-outline-danger btn-sm fa fa-trash"></button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });

        $(".hapus").click(function(e) {
            if (confirm("Apakah Anda Yakin?")) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).data('url'),
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "delete",
                    },
                    success: function(res) {
                        if (res.status == true) {
                            $("#gambar-" + res.id).remove();
                        }
                    }
                });
            } else {
                return false;
            }
        });
    </script> --}}
@endsection
