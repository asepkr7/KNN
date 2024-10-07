@extends('template.main')
@section('container')
 @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{ session('success') }}
                      </div>
                    </div>
                @endif
                <table class="table table-striped">
                    <a href="knn/create" class="btn btn-primary"></a>
          Tambah
        </button>
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">X</th>
            <th scope="col">Y</th>
            <th scope="col">Kategori</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>
@endsection
