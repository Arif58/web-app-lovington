@extends('layout.template')

@section('head-content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Product</h1>
      <a class="btn btn-primary mt-3" href="{{ route('product.create') }}">Tambah</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </div>
  </div>
</div>
@endsection
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>No</th>
      <th>Category</th>
      <th>Product</th>
      <th>Deskripsi</th>
      <th>Photo Url</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($responseBodyProduct->products as $response)
        <td>{{ ++$no }}</td>
        {{-- <td>{{ $response->category_id }}</td> --}}
        @for ($i = 0; $i < count($responseBodyCategory->categories); $i++)
          {{$i}}
          @if ( $response->category_id == $responseBodyCategory->categories[$i]->category_id )
          <td> {{ $responseBodyCategory->categories[$i]->category_name }} </td>
          @endif
        @endfor
        <td>{{ $response->product_name }}</td>
        <td>{{ $response->desc }}</td>
        <td><img src="{{ $response->photo_url }}" style="width: 200px"></td>
        <td class="d-flex justify-content-center">
          <div >
            <form action="{{ route('product.destroy', $response->product_id) }}" method="post">
              @csrf
              <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
          <div>
            <a class="btn btn-warning" href="{{ route('product.edit',['product_id' => $response->product_id, 'category_id' => $response->category_id]) }}">
              <i class="far fa-edit"></i>
            </a>
          </div>                        
        </td>
      </tr>
    @endforeach
  </table>    
@endsection