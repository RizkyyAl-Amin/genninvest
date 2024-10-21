@extends('admin.layouts.main')
@section('title', 'Data Kunjunan')
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
                        <h4 class="card-title">Data Kunjungan</h4>
                        <div style="float: right">
                            <a href="{{ route('kunjungans.create') }}" class="btn btn-success btn-sm">
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="data-table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="50">No.</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Writer</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kunjungans as $kunjungan)
                                        <tr id="index_{{ $kunjungan->id }}">
                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                            <td>{{ Str::words(strip_tags($kunjungan->title), 3, "...") }}</td>
                                            <td>{{ Str::words(strip_tags($kunjungan->content) , 3, "...") }}</td>
                                            <td>{{ $kunjungan->user->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('kunjungans.edit', [Crypt::encrypt($kunjungan->id)]) }}"
                                                    class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger" id="deleteKunjungan"
                                                    data-id="{{ Crypt::encrypt($kunjungan->id) }}"
                                                    data-original-id="{{ $kunjungan->id }}">
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
        $('body').on('click', '#deleteKunjungan', function() {
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
                        url: `/kunjungans/${encrypted_id}`,
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
