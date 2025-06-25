<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToken extends Model
{
    use HasFactory;

    protected $table = 'payment_token';
    protected $primaryKey = 'id_payment_token';
    protected $guarded = [];
    protected $casts = [
        'id_payment' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function batchProduk()
    {
        return $this->belongsTo(BatchProduk::class, 'batch_produk_id', 'id_batch_produk');
    }
}