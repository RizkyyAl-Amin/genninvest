@extends('admin.layouts.main')

@section('title', 'Data Article')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                            <h3 class="font-weight-bold">{{$data->title}}</h3>
                    </div>
                </div>
            </div>
            <form action="{{route("article.update",Crypt::encrypt($data->id))}}" method="POST" style="width: 100%;" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">judul</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Judul" value="{{ old('title', $data->title) }}">
                      @error('title')
                          <p class="mt-2 text-sm text-danger">
                              {{ $message }}
                          </p>
                      @enderror

                    </div>
                    <div class="form-group col-md-6">
                      <label for="penulis">Penulis</label>
                    <input type="text" name="writer" value="admin" class="form-control" id="penulis" placeholder="Penulis" value="{{ old('writer', $data->writer) }}">
                    @error('writer')
                                      <p class="mt-2 text-sm text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                  </div>

                  </div>
                  <div class="form-group">
                      <label for="paragraf_1">Paragraf 1</label>
                      <textarea rows="5" name="paragraf_1" cols="30" type="text" class="form-control" id="paragraf_1" placeholder="Paragraf 1">{{old("paragraf_1",$data->paragraf_1)}}</textarea>
                      @error('paragraf_1')
                          <p class="mt-2 text-sm text-danger">
                              {{ $message }}
                          </p>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="paragraf_2">Paragraf 2</label>
                      <textarea rows="5" name="paragraf_2" cols="30" type="text" class="form-control" id="paragraf_2" placeholder="Paragraf 2">{{old("paragraf_2",$data->paragraf_2)}}</textarea>
                      @error('paragraf_2')
                          <p class="mt-2 text-sm text-danger">
                              {{ $message }}
                          </p>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="paragraf_1">Paragraf 3</label>
                      <textarea rows="5" name="paragraf_3" cols="30" type="text" class="form-control" id="paragraf_1" placeholder="Paragraf 3">{{old("paragraf_3",$data->paragraf_3)}}</textarea>
                      @error('paragraf_3')
                          <p class="mt-2 text-sm text-danger">
                              {{ $message }}
                          </p>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="paragraf_4">Paragraf 1</label>
                      <textarea rows="5" name="paragraf_4" cols="30" type="text" class="form-control" id="paragraf_4" placeholder="Paragraf 4">{{old("paragraf_4",$data->paragraf_4)}}</textarea>
                      @error('paragraf_4')
                          <p class="mt-2 text-sm text-danger">
                              {{ $message }}
                          </p>
                      @enderror
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image">
                          @error('image')
                              <p class="mt-2 text-sm text-danger">
                                {{ $message }}
                            </p>
                          @enderror
                      </div>

                    </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
              </form>
        </div>
    </div>
</div>


@endsection


