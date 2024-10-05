@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">Edit direktur</h3>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Direktur</h4>
                        <form class="forms-sample"  action="{{ route('direktur.update', [Crypt::encrypt($direktur->id)]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Direktur" value="{{ old('nama', $direktur->nama) }}">
                        @error('nama')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="sambutan">Sambutan</label>
                        <textarea rows="15" name="sambutan" cols="30" type="text" class="form-control" id="sambutan" placeholder="Sambutan Direktur">{{old("sambutan",$direktur->sambutan)}}</textarea>
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