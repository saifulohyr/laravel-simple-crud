<div class="field">
    <label for="name">Nama Produk</label>
    <input id="name" type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required autofocus>
    @error('name')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="price">Harga (Rp)</label>
    <input id="price" type="number" name="price" min="0" value="{{ old('price', $product->price ?? 0) }}" required>
    @error('price')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="stock">Stok</label>
    <input id="stock" type="number" name="stock" min="0" value="{{ old('stock', $product->stock ?? 0) }}" required>
    @error('stock')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="description">Keterangan (opsional)</label>
    <textarea id="description" name="description" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <div class="error-text">{{ $message }}</div>
    @enderror
</div>
