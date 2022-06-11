@extends('layout.template')

@section('content')
<div class="content">
    <form method="post" action="{{ route('product.update', $responseBodyProduct->product->product_id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 w-50">
            <label for="id_buku" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" id="categoryId" aria-label="Default select example" onchange="categoryValue(this)">
                <option value="" disabled>Pilih Kategori</option>
                @for ($i = 0; $i < count($responseBodyCategory->categories); $i++)
                    <option value="{{ $responseBodyCategory->categories[$i]->category_id }}" {{ $responseBodyCategory->categories[$i]->category_id == $responseBodyProduct->product->category_id ? 'selected' : ''}}>{{ $responseBodyCategory->categories[$i]->category_name }} </option>
                @endfor
               
            </select>
        </div>
        <div class="mb-3 w-50">
            <label for="inputJudul" class="form-label">Nama Produk</label>
            <input type="text" name="product_name" class="form-control" value="{{ $responseBodyProduct->product->product_name }}">
        </div>
        <div class="mb-3 w-50">
            <label for="inputJudul" class="form-label">Harga</label>
            <input type="text" name="price" class="form-control" value="{{ $responseBodyProduct->product->price }}">
        </div>
        <div class="mb-3 w-50">
            <label for="inputJudul" class="form-label">Deskripsi</label>
            <input type="text" name="desc" class="form-control" value="{{ $responseBodyProduct->product->desc }}">
        </div>
        <div class="mb-3 w-50">
            <label for="inputJudul" class="form-label">Link Foto</label>
            <input type="text" name="photo_url" class="form-control" value="{{ $responseBodyProduct->product->photo_url }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="/product">Batal</a>
            </form>
</div>
<script>
  function categoryValue(event) {
        document.getElementById("categoryId").value = event.value;
        console.log(event.value);
    }
</script>

@endsection