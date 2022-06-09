@extends('layout.template')

@section('head-content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Category</h1>
      <a class="btn btn-primary mt-3" href="{{ route('category.create') }}">Tambah</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
     
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>No</th>
      <th>Category</th>
      <th>Photo Url</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($responseBody->categories as $response)
    <tr>
      <td>{{ ++$no }}</td>
      <td>{{ $response->category_name }}</td>
      <td>{{ $response->photo_url }}</td>
      <td class="d-flex justify-content-center">
        <div >
            <form action="{{ route('category.destroy', $response->category_id) }}" method="post">
            @csrf
                <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                  <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
        <div>
            <a class="btn btn-warning" href="{{ route('category.edit', $response->category_id) }}">
              <i class="far fa-edit"></i>
            </a>
        </div>                        
    </td>
    </tr>
    @endforeach
  </table>    
@endsection