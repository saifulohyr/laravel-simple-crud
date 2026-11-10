@extends('layouts.app')

@section('title', 'Tambah Produk — Simple CRUD')

@section('content')
<div class="container" style="max-width: 560px;">
    <div class="card">
        <div class="header-row">
            <h1>Tambah Produk</h1>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            @include('products._form')
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
