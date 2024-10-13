@extends("admin.layouts.main")

@section('title', 'Data Article')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Seluruh Data Article</h4>
                    <div style="float: right">
                        <a href="{{ route('article.create') }}" class="btn btn-success btn-sm">
                            Tambah Data
                        </a>
                    </div>
                    <div class="pt-3 table-responsive ">
                        <table class="table table-bordered" id="data-table">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center" width="50">No.</th>
                                    <th>Title</th>
                                    <th>Writer</th>
                                    <th>Paragraf Utana</th>
                                    <th class="text-center" width="100">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr id="index_{{ $article->id }}">
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ Str::words($article->title , 3, "...") }}</td>
                                        <td>{{ $article->writer }}</td>
                                        <td>{{ Str::words($article->paragraf_1 , 3, "...") }}</td>
                                        <td class="text-center d-flex">
                                            <a style="mr-2" href="{{ route('article.edit', [Crypt::encrypt($article->id)]) }}"
                                                class="btn btn-primary">
                                                Edit
                                            </a>
                                            <form class="inline" action="{{ route('article.destroy', [Crypt::encrypt($article->id)]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data dengan title {{$article->title}}?')">
                                                    Delete
                                                </button>
                                            </form>
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
@section("js")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#data-table').DataTable();
    })
</script>

@endsection
