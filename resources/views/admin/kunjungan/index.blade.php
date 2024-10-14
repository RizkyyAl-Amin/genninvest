@extends("admin.layouts.main")
@section('title', 'Data Kunjungan')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-5">
                            <h3 class="font-weight-bold">Kunjungan</h3>
                            <h6 class="font-weight-normal mb-2">Seluruh data Kunjungan</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content:space-evenly" class="row mt-1 mb-3">
                <div class="col-md-3 mb-2">
                    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary btn-block shadow-md">Tambah Kunjungan</a>
                </div>
                <div class="col-md-7">
                    <form class="form-inline" action="{{route("kunjungan.index")}}" method="get">
                        @csrf
                        <div class="input-group w-100">
                            <input class="form-control w-75 " name="search" type="search" placeholder="Cari Kunjungan" value="{{ request('search') }}" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table-prodi">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Judul</th>
                                        <th>Teks Artikel</th>
                                        <th>Penulis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kunjungans as $kunjungan )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{Str::words($kunjungan->title, 2, '...')}}</td><td>
                                                {!!Str::words($kunjungan->content, 2, '...')!!}
                                            </td>
                                            <td>{{ $kunjungan->writer}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-info" style="margin-right: 7px;">
                                                        <a href="{{ route('kunjungan.show', [Crypt::encrypt($kunjungan->id)]) }}"style="text-decoration: none; color: white;">
                                                            View
                                                        </a>
                                                    </button>
                                                    <button class="btn btn-primary" style="margin-right: 7px;">
                                                        <a style="color: white;text-decoration:none" href="{{ route('kunjungan.edit', [Crypt::encrypt($kunjungan->id)])}}">
                                                            Edit
                                                        </a>
                                                    </button>
                                                    <form action="{{ route('kunjungan.destroy', [Crypt::encrypt($kunjungan->id)])}}" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" class="btn btn-danger">Hapus</button>
                                                   </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pagination section with Bootstrap styling -->
            {{-- <div class="d-flex justify-content-center mt-4">
                {{ $datas->onEachSide(1)->links() }}
            </div> --}}
        </div>
    </div>
@endsection
