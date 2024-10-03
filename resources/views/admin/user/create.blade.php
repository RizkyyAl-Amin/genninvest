@extends('admin.layouts.main')

@section('title', 'Data User')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 offset-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah User</h4>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                    placeholder="Masukkan nama" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                                    placeholder="Masukkan email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role_id"
                                    class="form-control form-control-sm @error('role_id') is-invalid @enderror" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control form-control-sm @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password" name="password" required autocomplete="new-password">
                                <span style="font-size: 13px; color: red;">*Minimal 8 karakter.</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm"
                                    placeholder="Masukkan konfirmasi password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Simpan
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
