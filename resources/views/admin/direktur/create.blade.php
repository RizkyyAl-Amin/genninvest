@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">Tambah Direktur</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Direktur </h4>
                        <form class="forms-sample"  action="{{ route('direktur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Direktur">
                        @error('nama')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="sambutan">Sambutan</label>
                        <textarea class="form-control" id="sambutan" name="sambutan" rows="4" placeholder="Masukan Sambutan Direktur"></textarea>
                            @error('sambutan')
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