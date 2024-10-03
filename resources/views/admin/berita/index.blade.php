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
                            <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
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
                                        <th>Konten</th>
                                        <th>Author</th>
                                        <th>tanggal</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beritas as $item)
                                        <tr id="index_{{ $item->id }}">
                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                            <td>
                                                <img src="{{ asset($item->cover) }}" alt="{{ $item->judul }}"
                                                        style="max-height: 100px; max-width: 100px;">
                                            </td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->konten }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('user.edit', [Crypt::encrypt($item->id)]) }}"
                                                    class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger" id="delete-confirm"
                                                    data-id="{{ Crypt::encrypt($item->id) }}"
                                                    data-original-id="{{ $item->id }}">
                                                    Hapus
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

            swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!',
                customClass: {
                    popup: 'custom-swal-height'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/user/${encrypted_id}`,
                        type: "DELETE",
                        cache: false,
                        data: {
                            "_token": token
                        },
                        success: function(response) {
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: true,
                                timer: 3000
                            });

                            // Hapus elemen tabel berdasarkan ID asli
                            $(`#index_${original_id}`).remove();
                        }
                    });
                }
            });
        });
    </script>
@endsection
