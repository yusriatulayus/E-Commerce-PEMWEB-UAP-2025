@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
<p>Stok: {{ $product->stock }}</p>

<hr>

<form action="{{ route('wallet.checkout') }}" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <label>Jumlah:</label>
    <input type="number" name="qty" min="1" value="1">

    <button type="submit" class="btn btn-primary mt-3">
        Checkout pakai Saldo Wallet
    </button>
</form>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
@endif

@endsection
