@extends('layouts.app')

@section('title', 'Daftar Produk — Simple CRUD')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="header-row">
            <h1>Data Produk</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="search-form">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama produk...">
            <button type="submit" class="btn btn-secondary">Cari</button>
            @if ($search !== '')
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th style="width: 56px;">ID</th>
                        <th>Nama Produk</th>
                        <th class="num">Harga (Rp)</th>
                        <th class="num">Stok</th>
                        <th>Keterangan</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td class="num">{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="num">{{ $product->stock }}</td>
                            <td class="muted">{{ $product->description ?: '-' }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="muted" style="text-align: center; padding: 24px;">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="pagination">
                @if ($products->onFirstPage())
                    <span class="disabled">&laquo; Prev</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}">&laquo; Prev</a>
                @endif

                <span>Hal {{ $products->currentPage() }} / {{ $products->lastPage() }}</span>

                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}">Next &raquo;</a>
                @else
                    <span class="disabled">Next &raquo;</span>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection
