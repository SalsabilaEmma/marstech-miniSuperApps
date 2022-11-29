@extends('admin.layout.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.account.list') }}">{{ $title }}</a></li>
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
                        <form action="{{ route('user.account.update', $data_user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id" id="id">
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" value="{{ $data_user->name }}"
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
                                        <input type="text" id="email"
                                            class="form-control @error('email') is-invalid @enderror" value="{{ $data_user->email }}"
                                            name="email">
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">Ubah</button>
                                    <a href="{{ route('user.account.list') }}">
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
