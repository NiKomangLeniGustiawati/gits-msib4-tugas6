@extends('app')

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="/product/{{ $product->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="product_name" value="{{ $product->name }}">
            <div id="emailHelp" class="form-text">Nama produk tidak boleh lebih dari 255</div>
            @error('product_name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control @error('product_description') is-invalid @enderror"
                id="exampleInputPassword1" name="product_description" value="{{ $product->description }}">
            @error('product_description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="text" class="form-control @error('product_price') is-invalid @enderror"
                id="exampleInputPassword1" name="product_price" value="{{ $product->price }}">
            @error('product_price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </div>
        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example"
            name="category_id">
            <option selected>Pilih Kategori Produk</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">
                Pilih salah satu kategori
            </div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
    </form>
@endsection