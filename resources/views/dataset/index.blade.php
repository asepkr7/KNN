@extends('template.main')
@section('container')
 @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <div class="alert-body">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        {{ session('success') }}
                      </div>
                    </div>
                @endif
                <div class="input-group">
       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Tambah
       </button>
       <form action="/dataset/destroy" method="POST">
       @csrf
       @method('delete')
       <button class="btn btn-danger" type="submit">
           Reset
       </button>
       </form>
   </div>
                <table class="table table-striped">
                    {{-- <a href="dataset/create" class="btn btn-primary">Tambah</a> --}}
                     <!-- Button trigger modal -->
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">X</th>
            <th scope="col">Y</th>
            <th scope="col">Kategori</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dataset as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->atribute1 }}</td>
                <td>{{ $data->atribute2 }}</td>
                <td>{{ $data->kategori }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dataset</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/dataset/store" method="post">
    @csrf
                <div class="form-group">
                  <label for="x">X</label>
                  <input type="text" class="form-control  @error('atribute1') is-invalid @enderror" id="x" value="{{ old('atribute1') }}" name="atribute1">
                   @error('atribute1')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="y">Y</label>
                  <input type="text" class="form-control  @error('atribute2') is-invalid @enderror" id="y" value="{{ old('atribute2') }}" name="atribute2">
                   @error('atribute2')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <input type="text" class="form-control  @error('kategori') is-invalid @enderror" id="kategori" value="{{ old('kategori') }}" name="kategori">
                   @error('kategori')
                   <div class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="dataset" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
