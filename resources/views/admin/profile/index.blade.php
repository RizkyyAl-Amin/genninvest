@extends('admin.layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin">
                    <div class="row">
                        <!-- Kolom Gambar Profil -->
                        <div class="col-md-3 text-center">
                            <div class="profile-picture-container" style="position: relative;">
                                <img class="rounded-circle shadow" src="assets/images/faces/face28.jpg" alt="profile" width="150px" height="150px" />
                                <!-- Tombol Edit -->
                                <a href="#" class="btn btn-primary btn-sm" style="position: absolute; top: 80%; left: 50%; transform: translate(-50%, -50%);">Edit Profile</a>
                            </div>
                        </div>

                        <!-- Kolom Informasi Pengguna -->
                        <div class="col-md-7">
                            <h3 class="font-weight-bold mt-3">Welcome, {{ Auth::user()->name }}</h3>
                            
                            <!-- Form Edit Data Pengguna -->
                            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="name"><strong>Nama Lengkap :</strong></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email"><strong>Email :</strong></label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="password"><strong>Password :</strong></label>
                                    <input type="password" id="password" name="password" class="form-control" value="{{ Auth::user()->password ?? '' }}" placeholder="Password" disabled>
                                </div> --}}

                                <div class="form-group">
                                    <label for="password"><strong>Ubah Password :</strong></label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Ubah Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation"><strong>Konfirmasi Password :</strong></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                        href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

    <!-- Optional: Add Custom CSS in the same blade -->
    <style>
        .profile-picture-container img {
            border: 5px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-details .list-group-item {
            background-color: transparent;
        }

        .btn-sm {
            font-size: 12px;
            padding: 5px 10px;
        }

        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
