@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lelang.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('lelang.update', $data_lelang->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Judul {{ $title }}</label>
                                            <div class="input-group">
                                                <input type="text" required name="judul" id="judul"
                                                    value="{{ $data_lelang->judul }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Aset</label>
                                            <div class="input-group">
                                                <input type="text" required name="kode_aset" id="kode_aset"
                                                    value="{{ $data_lelang->kode_aset }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <div class="input-group">
                                                <input type="text" required name="harga" id="harga"
                                                    value="{{ $data_lelang->harga }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <div class="input-group">
                                                <input type="text" required name="lokasi" id="lokasi"
                                                    value="{{ $data_lelang->lokasi }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" required name="tanggal" id="tanggal"
                                                    value="{{ $data_lelang->tanggal }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <div class="input-group">
                                                <input type="text" required name="no_telp" id="no_telp"
                                                    value="{{ $data_lelang->no_telp }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <div class="input-group">
                                                <textarea type="text" name="detail" id="detail" value="" class="summernote form-control">{{ $data_lelang->detail }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>File Gambar</label>
                                            <div class="row">
                                                @foreach ($data_lelang->gambar as $gambar)
                                                    <div class="col-md-4">
                                                        <div class="input-group" id="gambar-{{ $gambar->id }}">
                                                            <div class="zoom">
                                                                <img id="file" class="profile-user-img img-responsive"
                                                                    style="height: 80px; width: auto; display: block; margin: auto;"
                                                                    src="{{ url('image/lelang/' . $gambar->gambar) }}"
                                                                    alt="Gambar Lelang">
                                                            </div>
                                                            {{-- <input type="file" required name="foto[]" autocomplete="off"
                                                                    autocomplete="off" accept="image/*" id="file-input"
                                                                    onchange="imageExtensionValidate(this)"
                                                                    class="m-input form-control @error('foto') is-invalid @enderror"
                                                                    placeholder="">
                                                                @error('foto')
                                                                    <small>{{ $message }}</small>
                                                                @enderror --}}

                                                            <div class="input-group-append">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm fa fa-trash hapus"
                                                                    data-url="{{ route('lelang.delete', $gambar->id) }}"></button>

                                                                {{-- <button type="button"
                                                                    class="btn btn-outline-danger btn-sm fa fa-trash hapus"
                                                                    data-url="{{ route('lelang.delete', $gambar->id) }}"></button> --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr><label>Tambah Data Gambar</label>
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-success m-t-15 waves-effect">+
                                            Tambah
                                            Baris</button>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Ubah</button>
                                    <a href="{{ route('lelang.list') }}">
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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    </script>
@endsection
