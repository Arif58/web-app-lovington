@extends('layout.template')

@section('content')
<div class="content">
    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Kategori</label>
                <input type="text" name="category_name" class="form-control">
            </div>
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Link Foto</label>
                <input type="text" name="photo_url" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/category">Batal</a>
    </form>
           
</div>

@endsection