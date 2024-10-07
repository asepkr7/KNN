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
       <form action="/datatraining/destroy" method="POST">
       @csrf
       @method('delete')
       <button class="btn btn-danger" type="submit">
           Reset
       </button>
       </form>
   </div>
    <form action="{{ route('datatraining.index') }}" method="GET">
            <div class="form-group">
                <label for="id">Pilih Data Training:</label>
                <select class="form-control" id="id" name="id">
                    @foreach ($dataTrainings as $item)
                    <option value="{{$item->id  }}" selected>X : {{ $item->datauji1 }} | Y :{{ $item->datauji2 }}</option>
                    @endforeach
                    <!-- Tambahkan opsi-opsi lainnya dari database -->
                </select>
            </div>
            <div class="form-group">
                <label for="k">Masukan Nilai K</label>
                <input type="text" class="form-control" name="k" value="{{ old('k') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                <table class="table table-striped">
                    {{-- <a href="dataset/create" class="btn btn-primary">Tambah</a> --}}
                     <!-- Button trigger modal -->
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">X</th>
            <th scope="col">Y</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dataUji as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->datauji1 }}</td>
                <td>{{ $data->datauji2 }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <hr>
      <h4>Neighbors : </h4>
      <table class="table table-striped">
        <thead>
            <tr>
            <th>X</th>
            <th>Y</th>
            <th>Jarak</th>
            <th>kategori</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($neighbors as $neighbor)
            <tr>
                <td>
                    {{ $neighbor->atribute1}}
                </td>
                <td>{{ $neighbor->atribute2}}</td>
                <td> {{ $neighbor->distance }}</td>
                <td>{{ $neighbor->kategori }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
       <div class="row mt-4">
            <div class="col-md-6">
                <h4>Prediksi</h4>
                <p>{{ $predictedCategory }}</p>
            </div>
        </div>
    </div>
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dataset</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/datatraining/store" method="post">
              @csrf
                <div class="form-group">
                  <label for="x">X</label>
                  <input type="text" class="form-control  @error('datauji1') is-invalid @enderror" id="x" value="{{ old('datauji1') }}" name="datauji1">
                   @error('datauji1')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="y">Y</label>
                  <input type="text" class="form-control  @error('datauji2') is-invalid @enderror" id="y" value="{{ old('datauji2') }}" name="datauji2">
                   @error('datauji2')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="k">K</label>
                    <input type="text" class="form-control  @error('k') is-invalid @enderror" name="k">
                     @error('k')
                     <div class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                </div> --}}
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
