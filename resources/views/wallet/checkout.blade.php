@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px">

    <h2 class="mb-4 text-center">Checkout Dengan Saldo Wallet</h2>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- FORM CHECKOUT --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('wallet.checkout') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Product ID</label>
                    <input type="number" name="product_id" class="form-control" placeholder="Misal: 1" required>
                    <small class="text-muted">Isi dengan ID produk yang ada di database.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah (Qty)</label>
                    <input type="number" name="qty" class="form-control" min="1" required value="1">
                </div>

                <button type="submit" class="btn btn-primary w-100">Checkout Sekarang</button>
            </form>

        </div>
    </div>

</div>
@endsection
