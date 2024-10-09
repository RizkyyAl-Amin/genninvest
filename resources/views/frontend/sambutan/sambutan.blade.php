
@section("content")
<section id="artikel" style="margin-top: 10rem" class="artikel d-flex justify-content-center gap-3 p-3">

    <div class="d-flex flex-column align-items-center " style="max-width: 70%">
        <img class="card-img-top" style="height: 25rem;width:20rem; object-position: center; background-position: center;" src="https://plus.unsplash.com/premium_photo-1682125707803-f985bb8d8b6a?q=80&w=1416&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        <div class="card-body">
          <h4 class="card-title text-center mt-4">{{$directur->nama}}</h4>
          <p class="text-secondary text-center font-weight-light">- Direktur -</p>
          <p class="card-text text-center">{{$directur->sambutan}}</p>
        </div>
      </div>

</section>
@endsection
@include('frontend.layouts.main')
