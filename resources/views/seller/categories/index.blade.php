<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori Produk Saya
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('categories.create') }}"
               class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
                + Tambah Kategori
            </a>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2">Nama</th>
                            <th class="p-2">Slug</th>
                            <th class="p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-t">
                                <td class="p-2">{{ $category->name }}</td>
                                <td class="p-2">{{ $category->slug }}</td>
                                <td class="p-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="text-blue-600">Edit</a>

                                    |

                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
