@extends('layout.template')

@section('content')
<div class="content">
    <?php
    var_dump($responseBody)
    ?>
    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
            @foreach ($responseBody->categories as $response)
            <div class="mb-3 w-50">
                <label for="inputJudul" class="form-label">Kategori</label>
                <input type="text" name="category_name" class="form-control" value="">
            </div>
            @endforeach
            <div class="mb-3 w-50">
                <label for="foto" class="form-label">Upload Foto</label>
                <img class="img-preview img-fluid mb-3 mx-auto">
                <input type="file" id="image" name="foto" class="form-control d-block @error('foto') is-invalid @enderror" onchange="previewImage()">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/category">Batal</a>
            </form>
            <script>
                function previewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');
                    imgPreview.style.display = "block";
                    // imgPreview.style.height = "200px";
                    // imgPreview.style.width = "180px";
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);
                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
            </script>
</div>

@endsection