@extends('admin.layouts.main')

@section('title', 'Kategori Article')

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
                        <h4 class="card-title">Kategori Article</h4>
                        <div style="float: right">
                            <a href="{{ route('kategoriArticle.create') }}" class="btn btn-success btn-sm">
                                Tambah Kategori
                            </a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Nama Kategori</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $item)
                                        <tr id="index_{{ $item->id }}">
                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center d-flex justify-content-between">
                                                <a href="{{ route('kategoriArticle.edit', [Crypt::encrypt($item->id)]) }}"
                                                    class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a>
                                                    <form action="{{ route('kategoriArticle.destroy', [Crypt::encrypt($item->id)]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
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
    <script>
        $('body').on('click', '#delete-confirm', function() {
            let encrypted_id = $(this).data('id'); // Encrypted ID for request
            let original_id = $(this).data('original-id'); // Original ID for element removal
            let token = $("meta[name='csrf-token']").attr("content");

            
        });
    </script>
@endsection
