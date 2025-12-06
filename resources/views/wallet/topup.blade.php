<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Topup Saldo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('info'))
                    <div class="mb-4 text-blue-700">
                        {{ session('info') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('wallet.topup') }}">
                    @csrf

                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">
                            Nominal Topup
                        </label>
                        <input id="amount" name="amount" type="number" min="1000"
                               class="mt-1 block w-full border-gray-300 rounded-md"
                               required>

                        @error('amount')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-primary-button>
                            Topup
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
