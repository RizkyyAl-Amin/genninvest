@extends('admin.layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-5">
                            <h3 class="font-weight-bold">Sambutan Direktur</h3>
                            <h6 class="font-weight-normal mb-2">Sambutan Direktur Politeknik Digital Boash Indonesia</h6>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="data-table-direktur">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Sambutan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($direktur as $direktur)
                                                <tr>
                                                    <td>{{ $direktur->nama }}</td>
                                                    <td>
                                                        {{Str::words($direktur->sambutan, 5, '...')}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-info" style="margin-right: 7px;">
                                                                <a href="{{ route('direktur.show', $direktur->id) }}" style="text-decoration: none; color: white;">
                                                                    View
                                                                </a>
                                                            </button>
                                                            <button class="btn btn-warning" style="margin-right: 7px;">
                                                                <a href="{{ route('direktur.edit', [Crypt::encrypt($direktur->id)]) }}" style="text-decoration: none; color: white;">
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
        $('#data-table-direktur').DataTable({
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