@extends('template.main')
@section('container')
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
              <a href="/" class="btn btn-secondary">back</a>
              <button type="submit" name="dataset" class="btn btn-primary">Save</button>
            </form>
            @endsection
