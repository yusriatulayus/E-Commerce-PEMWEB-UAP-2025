<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StoreBalance extends Model
{
<<<<<<< HEAD
    //ini buat git
=======

>>>>>>> 036daaa8f8af35e779eeb5601c169a0c5d527ff8
    protected $fillable = [
        'store_id',
        'balance',
    ];

    protected $casts = [
        'balanace' => 'decimal:2'
    ];

    // relationships one store balance belongs to one store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function storeBalanceHistories()
    {
        return $this->hasMany(StoreBalanceHistory::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}