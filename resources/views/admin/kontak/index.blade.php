@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-5">
                            <h3 class="font-weight-bold">Kontak</h3>
                            <h6 class="font-weight-normal mb-2">Kontak Resmi Politeknik Digital Boash Indonesia</h6>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data-table-kontak">
                                        <thead>
                                            <tr>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>No Handphone</th>
                                                <th>Facebook</th>
                                                <th>Instagram</th>
                                                <th>Youtube</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kontak as $kontak)
                                                <tr>
                                                    <td>{{ $kontak->alamat }}</td>
                                                    <td>{{ $kontak->email }}</td>
                                                    <td>{{ $kontak->no_hp }}</td>
                                                    <td>{{ $kontak->fb_url }}</td>
                                                    <td>{{ $kontak->ig_url }}</td>
                                                    <td>{{ $kontak->yt_url }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-warning" style="margin-right: 7px;">
                                                                <a href="{{ route('kontak.edit', [Crypt::encrypt($kontak->id)]) }}" style="text-decoration: none; color: white;">
                                                                    Edit
                                                                </a>
                                                            </button>
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
        $('#data-table-kontak').DataTable({
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