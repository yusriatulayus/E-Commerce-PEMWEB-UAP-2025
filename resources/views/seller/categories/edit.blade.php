<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-2">Nama</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Deskripsi</label>
                        <textarea name="description"
                                  class="w-full border px-3 py-2 rounded">{{ $category->description }}</textarea>
                    </div>

                    <button class="bg-green-600 px-4 py-2 text-white rounded">
                        Update
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
