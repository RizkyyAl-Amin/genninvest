@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">Edit Kontak</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Kontak</h4>
                        <form class="forms-sample"  action="{{ route('kontak.update', [Crypt::encrypt($kontak->id)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Polliteknik" value="{{ old('alamat', $kontak->alamat) }}">
                        @error('alamat')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Polliteknik" value="{{ old('email', $kontak->email) }}">
                        @error('email')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="no_hp">No Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No Handphone Polliteknik" value="{{ old('no_hp', $kontak->no_hp) }}">
                        @error('no_hp')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="fb_url">Facebook</label>
                        <input type="text" class="form-control" id="fb_url" name="fb_url" placeholder="Facebook Resmi Polliteknik" value="{{ old('fb_url', $kontak->fb_url) }}">
                        @error('fb_url')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="ig_url">Instagram</label>
                        <input type="text" class="form-control" id="ig_url" name="ig_url" placeholder="Instagram Resmi Polliteknik" value="{{ old('ig_url', $kontak->ig_url) }}">
                        @error('ig_url')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="yt_url">Youtube</label>
                        <input type="text" class="form-control" id="yt_url" name="yt_url" placeholder="Youtube Resmi Polliteknik" value="{{ old('yt_url', $kontak->yt_url) }}">
                        @error('yt_url')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection