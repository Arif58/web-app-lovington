@extends('layout.template')

@section('content')
<div class="content">
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 w-50">
                <label for="id_buku" class="form-label">Kategori</label>
                <select name="category_id" class="form-control" aria-label="Default select example">
                    <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($responseBody->categories as $response)
                    <option value="{{ $response->category_id }}">{{ $response->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Nama Produk</label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Harga</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Deskripsi</label>
                <input type="text" name="desc" class="form-control">
            </div>
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Link Foto</label>
                <input type="text" name="photo_url" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/product">Batal</a>
    </form>
           
</div>

@endsection