<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2">Nama Kategori</label>
                        <input type="text" name="name" required class="w-full border px-3 py-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Slug</label>
                        <input type="text" name="slug" class="w-full border px-3 py-2 rounded">
                        <p class="text-sm text-gray-500">Boleh dikosongkan → otomatis dibuat</p>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Deskripsi</label>
                        <textarea name="description"
                                  class="w-full border px-3 py-2 rounded"></textarea>
                    </div>

                    <button class="bg-blue-600 px-4 py-2 text-white rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
