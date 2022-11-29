@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <!--
                                                <div style="padding-left: 25px">
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                                        data-target="#tambahdata">Tambah Data</button>
                                                </div><br>
                                                -->
                                <div class="table-responsive">
                                    <table class="table table-striped" id="save-stage" style="width:100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 50px">No</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th style="width: 250px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_user as $user)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    @if ($user->role == '1')
                                                        <td>Admin</td>
                                                    @elseif ($user->role == '2')
                                                        <td>User / Pengguna</td>
                                                    @endif
                                                    <td class="text-center">
                                                        {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                            action="{{ route('user.account.destroy', $user->id) }}"
                                                            method="POST"> --}}
                                                        <button type="button" class="show btn btn-sm btn-outline-info"
                                                            data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                            data-role="{{ $user->role }}"
                                                            data-email="{{ $user->email }}"
                                                            {{-- data-password="{{ $user->password }}" --}}
                                                            data-remember_token="{{ $user->remember_token }}">
                                                            <i data-feather="info"></i> Detail
                                                        </button>
                                                        {{-- <button type="button"
                                                                class="ubah btn btn-sm btn-outline-success"
                                                                data-id="{{ $user->id }}"
                                                                data-name="{{ $user->name }}"
                                                                data-isi="{{ $user->isi }}" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i data-feather="edit"></i>
                                                            </button> --}}
                                                        {{-- <a href="{{ route('user.account.edit', $user->id) }}"
                                                            class="btn btn-sm btn-outline-success"><i
                                                                data-feather="edit"></i> Edit
                                                        </a> --}}
                                                        {{-- @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                    data-feather="trash-2"></i> Hapus</button>
                                                        </form> --}}

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal tambah data -->
    <!--
                <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModal">Tambah {{ $title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user.account.store') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Judul {{ $title }}</label>
                                                <div class="input-group">
                                                    <input type="text" required
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Judul  {{ $title }}" name="name">
                                                    @error('name')
        <small>{{ $message }}</small>
    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <div class="input-group">
                                                    <input type="text" required
                                                        class="form-control @error('no_telp') is-invalid @enderror"
                                                        placeholder="No Telepon" name="no_telp">
                                                    @error('no_telp')
        <small>{{ $message }}</small>
    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Lokasi</label>
                                                <div class="input-group">
                                                    <input type="text" required
                                                        class="form-control @error('lokasi') is-invalid @enderror" placeholder="lokasi"
                                                        name="lokasi">
                                                    @error('lokasi')
        <small>{{ $message }}</small>
    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="text" required
                                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                                        name="email">
                                                    @error('email')
        <small>{{ $message }}</small>
    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <div class="input-group">
                                            <textarea type="text" required name="alamat_lengkap"
                                                class="form-control @error('alamat_lengkap') is-invalid @enderror" placeholder="Alamat Lengkap"></textarea>
                                            @error('alamat_lengkap')
        <small>{{ $message }}</small>
    @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <div class="input-group">
                                            {{-- <textarea name="isi" class="summernote @error('isi') is-invalid @enderror" placeholder="Deskripsi  {{ $title }}"></textarea>
                                        @error('isi')
                                            <small>{{ $message }}</small>
                                        @enderror --}}
                                            <textarea type="text" required name="isi" class="form-control @error('isi') is-invalid @enderror"
                                                placeholder="Deskripsi  {{ $title }}"></textarea>
                                            @error('isi')
        <small>{{ $message }}</small>
    @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Submit</button>
                                        <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        -->
    <!-- Modal lihat data -->
    <div class="modal fade" id="lihatdata" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Detail {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" id="name" readonly
                                    class="form-control @error('name') is-invalid @enderror" placeholder="No Telepon"
                                    name="name">
                                @error('name')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" id="email" readonly
                                    class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                    name="email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="hidden" name="id" id="id">
                                <input type="text" id="password" readonly
                                    class="form-control @error('password') is-invalid @enderror" placeholder="password"
                                    name="password">
                                @error('password')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-dark m-t-15 waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.show').click(function() {
                $('#lihatdata').modal('show');
                $("#lihatdata").find("#id").attr("value", $(this).data('id'));
                $("#lihatdata").find("#name").attr("value", $(this).data('name'));
                $("#lihatdata").find("#password").attr("value", $(this).data('password'));
                $("#lihatdata").find("#email").attr("value", $(this).data('email'));
            });
        });
    </script>

    {{-- <script>
    $(document).ready(function() {
        $('.ubah').click(function() {
            $('#editdata').modal('ubah');
            $("#editdata").find("#id").attr("value", $(this).data('id'));
            $("#editdata").find("#name").attr("value", $(this).data('name'));
            $("#editdata").find("#isi").attr("value", $(this).data('isi'));
        });
    });
</script> --}}
