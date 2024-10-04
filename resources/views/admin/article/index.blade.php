@extends("admin.layouts.main")

@section('title', 'Data Article')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 ml-5">
                            <h3 class="font-weight-bold">Article</h3>
                            <h6 class="font-weight-normal mb-2">Seluruh data article Universitas XYZ</h6>
                            <a href="{{ route('article.create') }}" class="btn btn-primary shadow-md mb-3 mt-5">Tambah Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group of cards -->
            <div class="card-group d-flex flex-wrap">
                @foreach ($datas as $data)
                    <div class="card mr-3 mb-3" style="min-width: 14rem; max-width: 16rem;">
                        <img src="{{asset("img/articles_images/". $data->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{Str::words($data->title, 3, '...')}}</h5>
                            <p class="card-text">{{Str::words($data->text_article, 5, '...')}}</p>
                            <p class="card-text"><small class="text-body-secondary">writer : {{$data->writer}}</small></p>
                            <p class="card-text"><small class="text-body-secondary">created : {{$data->created_at}} | {{$data->created_at->diffForHumans()}}</small></p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary" style="margin-right: 7px;">
                                    <a style="color: white;text-decoration:none" href="{{ route('article.edit', [Crypt::encrypt($data->id)]) }}">
                                        Edit
                                    </a>
                                </button>
                                <form action="{{ route('article.destroy', [Crypt::encrypt($data->id)]) }}" method="post">

                                    @csrf
                                    @method("delete")
                                    <button onclick="return confirm('apakah anda yakin ingin menghapus article dengan title {{$data->title}}')" type="submit" class="btn btn-danger">Hapus</button>
                               </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination section with Bootstrap styling -->
            <div class="d-flex justify-content-center mt-4">
                {{ $datas->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
