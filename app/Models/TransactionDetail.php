<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
<<<<<<< HEAD
    
=======

>>>>>>> 036daaa8f8af35e779eeb5601c169a0c5d527ff8
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'subtotal',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
