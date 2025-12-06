<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
   protected $fillable = [
        'user_id',
        'balance',
    ];

    // CASTING balance agar selalu float
    protected $casts = [
        'balance' => 'float',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke transaksi (topup / checkout)
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }

    // Accessor (opsional): format saldo otomatis
    public function getFormattedBalanceAttribute()
    {
        return number_format($this->balance, 0, ',', '.');
    }
}
