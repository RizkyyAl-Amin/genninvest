@extends('admin.layouts.main')

@section('title', 'Data Prodi')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-5">
                            <h3 class="font-weight-bold">Program Studi</h3>
                            <h6 class="font-weight-normal mb-2">Informasi terkait Program Studi di Universitas XYZ </h6>
                            <a href="{{ route('prodi.create') }}" class="btn btn-primary shadow-md mb-3">Tambah Prodi</a>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Program Studi</th>
                                                <th>Logo</th>
                                                <th>Thumbnail</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prodis as $prodi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $prodi->nama_prodi }}</td>
                                                    <td>
                                                        @if($prodi->logo)
                                                            <img src="{{ asset('img/uploaded_images/' . $prodi->logo) }}" alt="Logo Image" class="img-thumbnail" style="width: 50px; height: auto;">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($prodi->thumbnail)
                                                            <img src="{{ asset('img/uploaded_images/' . $prodi->thumbnail) }}" alt="Thumbnail Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-info" style="margin-right: 7px;">
                                                                <a href="{{ route('prodi.show', $prodi->id) }}" style="text-decoration: none; color: white;">
                                                                    View
                                                                </a>
                                                            </button>
                                                            <button class="btn btn-warning" style="margin-right: 7px;">
                                                                <a href="{{ route('prodi.edit', [Crypt::encrypt($prodi->id)]) }}" style="text-decoration: none; color: white;">
                                                                    Edit
                                                                </a>
                                                            </button>
                                                            <form action="{{ route('prodi.destroy', [Crypt::encrypt($prodi->id)]) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#data-table-prodi').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>
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
