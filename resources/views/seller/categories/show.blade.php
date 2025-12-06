<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">

        <p><strong>Slug:</strong> {{ $category->slug }}</p>
        <p><strong>Deskripsi:</strong> {{ $category->description }}</p>

        <a href="{{ route('seller.categories.index') }}" class="text-indigo-600 mt-4 block">← Kembali</a>

    </div>
</x-app-layout>
