@extends('admin.layouts.main')

@section('title', 'Berita')

@section('css')
    <style>
        .custom-swal-height {
            height: 350px;
            max-height: 80vh;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Berita</h4>
                        <div style="float: right">
                            <a href="{{ route('berita.create') }}" class="btn btn-success btn-sm">
                                Tambah Berita
                            </a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Konten</th>
                                        <th>Author</th> <!-- Mengubah ke Author -->
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beritas as $item)
                                        <tr id="index_{{ $item->id }}">
                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                            <td class="text-center">
                                                <img src="{{ asset('img/cover-berita/' . $item->cover) }}"
                                                    alt="{{ $item->judul }}"
                                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 0;">
                                            </td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->kategori->nama }}</td>
                                            <td style="word-wrap: break-word; max-width: auto;">{!! \Illuminate\Support\Str::limit(strip_tags($item->konten), 70, '...') !!}</td>
                                            <td>{{ $item->user->name }}</td> <!-- Mengambil nama user dari relasi -->
                                            <td class="text-center d-flex justify-content-between">
                                                <a href="{{ route('berita.edit', [Crypt::encrypt($item->id)]) }}"
                                                    class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a>
                                                    <form
                                                        action="{{ route('berita.destroy', [Crypt::encrypt($item->id)]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                                    </form>
                                                </a>
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
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data-table').DataTable();
        })
    </script>
@endsection
