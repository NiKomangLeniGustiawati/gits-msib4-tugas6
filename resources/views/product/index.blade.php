@extends('app')

@section('content')
    <a href="{{ url('/product/add') }}">
        <button class="btn btn-primary mt-4" type="button">+ Tambah Produk</button>
    </a>
    @foreach ($products as $item)
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">
                    {{ $item->name }} ( {{ $item->price }} )
                </div>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->category->name }}</h6>
                <div class="card-text">{{ $item->description }}</div>
                <a href="/product/{{ $item->id }}/edit">
                    <button class="btn btn-warning mt-2" type="button">Ubah</button>
                </a>
                <a href="/product/{{ $item->id }}/delete">
                    <button class="btn btn-danger mt-2" type="button">Hapus</button>
                </a>
            </div>
        </div>
    @endforeach
@endsection