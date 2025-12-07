<x-app-layout>

<h1 class="text-3xl font-bold mb-6">Semua Produk</h1>

<!-- FILTER KATEGORI -->
<form method="GET" class="mb-4">
    <select name="category" onchange="this.form.submit()" class="border rounded px-3 py-2">
        <option value="">Semua Kategori</option>

        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ $selectedCategory == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</form>

<!-- LIST PRODUK -->
<div class="grid grid-cols-3 gap-6">
    @foreach ($products as $product)
        <div class="border shadow rounded p-4 bg-white">
            <img src="{{ asset('storage/' . $product->image) }}" alt="" class="h-40 object-cover mb-3">

            <h2 class="text-xl font-bold">{{ $product->name }}</h2>
            <p class="text-pink-700 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <a href="{{ route('product.show', $product->slug) }}"
               class="mt-3 inline-block bg-pink-400 text-white px-4 py-2 rounded">
               Lihat Detail
            </a>
        </div>
    @endforeach
</div>

</x-app-layout>
