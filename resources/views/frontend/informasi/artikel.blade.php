
@section("content")
<section id="artikel" style="margin-top: 10rem" class="artikel d-flex justify-content-center gap-3 p-3">
    <div class="container"  style="max-width: 60%" data-aos="fade-up">
        <div class="d-flex gap-2 ">
            <h2>Tulisan Terbaru</h2>
            {{-- <form class="form-inline" action="{{route("")}}" method="get">
                @csrf
                <div class="d-flex align-items-center">
                    <input class="form-control w-75" name="search" type="search" placeholder="Cari Artikel" value="{{ request('search') }}" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>

            </form> --}}
        </div>
        @foreach ($articles as $article)
        <div class="card mb-3" style="max-width: 700px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if (file_exists(public_path('img/articles_images/' . $article->image)) && $article->image)
                    <img style="width: 14rem; height: 14rem;" src="{{ asset('img/articles_images/' . $article->image) }}" class="img-fluid rounded-start" alt="...">
                @else
                    <div style="width: 14rem; height: 14rem; background-color: white;" class="img-fluid rounded-start d-flex justify-content-center align-items-center">
                        <span>No Image</span> <!-- Pesan fallback -->
                    </div>
                @endif

              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <a href="{{ route('readArticle', ['title' => $article->title]) }}"
                        style="text-transform: capitalize; font-weight: bold; font-size:1rem;"
                        class="card-title">
                        {{ $article->title }}
                     </a>

                  <p style="text-align:left;font-size:0.9rem;margin-top:0.4rem" class="card-text">{{Str::words($article->paragraf_1,25,"...")}}</p>
                  <p style="margin-top:0.9rem " class="card-text"><small class="text-body-secondary">Updated {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }} - oleh {{$article->writer}}</small></p>
                </div>
              </div>
            </div>

          </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->onEachSide(1)->links() }}
        </div>
    </div>
    <div style="max-width: 35%;padding:0.3rem" class="">

        <div class="card" style="max-width: 70%">
            <img class="card-img-top" style="height: 25rem; object-position: center; background-position: center;" src="https://plus.unsplash.com/premium_photo-1682125707803-f985bb8d8b6a?q=80&w=1416&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
            <div class="card-body">
              <h4 class="card-title text-center">{{$directur->nama}}</h4>
              <p class="text-secondary text-center font-weight-light">- Direktur -</p>
              <p class="card-text">{{Str::words($directur->sambutan,20,"...")}}</p>
            </div>

            <div class="card-body">
              <a href="{{route("sambutan")}}" class="card-link">Selengkapnya</a>
            </div>
          </div>
    </div>

</section>
@endsection
@include('frontend.layouts.main')
