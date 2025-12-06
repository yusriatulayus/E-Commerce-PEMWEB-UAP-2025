<?php

namespace App\Http\Controllers;

use App\Models\UserBalance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    /**
     * Form sederhana untuk test topup (nanti bisa dipercantik frontend).
     */
    public function topupForm()
    {
        return view('wallet.topup');
    }

    /**
     * Buat transaksi TOPUP + generate VA number.
     */
    public function topup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        $user = auth()->user();

        // Kode transaksi & nomor VA dummy
        $code = 'TOPUP-' . strtoupper(Str::random(10));
        $va   = '98765' . rand(1000000, 9999999);

        // Simpan ke tabel transactions (pakai kolom yang sudah ada di migration kamu)
        $transaction = Transaction::create([
            'code'            => $code,
            'buyer_id'        => $user->id,
            'store_id'        => 1, // sementara pakai 1 atau store default
            'address'         => '-',
            'address_id'      => '-',
            'city'            => '-',
            'postal_code'     => '-',
            'shipping'        => '-',
            'shipping_type'   => '-',
            'shipping_cost'   => 0,
            'tracking_number' => null,
            'tax'             => 0,
            'grand_total'     => $request->amount,
            'payment_status'  => 'unpaid',
        ]);

        // Di UAP, VA number biasanya disimpan juga.
        // Kalau tabel transactions-mu punya kolom 'va_number', isi di sini.
        if (schema()->hasColumn('transactions', 'va_number')) {
            $transaction->va_number = $va;
            $transaction->save();
        }

        return redirect()
            ->back()
            ->with('success', "Topup dibuat! Kode: $code, VA: $va");
    }

    /**
     * Simulasi: pembayaran VA berhasil → saldo user bertambah.
     */
    public function confirmTopup(Transaction $transaction)
    {
        // Kalau sudah paid, jangan dobel
        if ($transaction->payment_status === 'paid') {
            return back()->with('info', 'Topup ini sudah pernah dikonfirmasi.');
        }

        $transaction->payment_status = 'paid';
        $transaction->save();

        // Ambil / buat saldo user
        $balance = UserBalance::firstOrCreate(
            ['user_id' => $transaction->buyer_id],
            ['balance' => 0]
        );

        $balance->balance += $transaction->grand_total;
        $balance->save();

        return back()->with('success', 'Topup berhasil, saldo sudah bertambah.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty'        => 'required|integer|min:1',
        ]);

        $user    = auth()->user();
        $product = Product::findOrFail($request->product_id);

        // ambil / buat saldo user
        $wallet = UserBalance::firstOrCreate(
            ['user_id' => $user->id],
            ['balance' => 0]
        );

        $total = $product->price * $request->qty;

        // cek saldo cukup
        if ($wallet->balance < $total) {
            return back()->with('error', 'Saldo tidak cukup untuk checkout.');
        }

        // cek stok cukup
        if ($product->stock < $request->qty) {
            return back()->with('error', 'Stok produk tidak cukup.');
        }

        // kurangi saldo dan stok
        $wallet->balance -= $total;
        $wallet->save();

        $product->stock -= $request->qty;
        $product->save();

        // buat transaksi "paid" (pakai struktur tabel transactions yang sudah kamu punya)
        Transaction::create([
            'code'            => 'ORDER-' . strtoupper(Str::random(8)),
            'buyer_id'        => $user->id,
            'store_id'        => $product->store_id ?? 1,
            'address'         => '-',
            'address_id'      => '-',
            'city'            => '-',
            'postal_code'     => '-',
            'shipping'        => '-',
            'shipping_type'   => '-',
            'shipping_cost'   => 0,
            'tracking_number' => null,
            'tax'             => 0,
            'grand_total'     => $total,
            'payment_status'  => 'paid',
        ]);

        return back()->with('success', 'Checkout dengan saldo berhasil!');
    }
}
