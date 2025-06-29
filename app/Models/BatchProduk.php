<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchProduk extends Model
{
    use HasFactory;

    protected $table = 'batch_produk';
    protected $primaryKey = 'id_batch_produk';
    protected $guarded = [];
    protected $casts = [
        'id_batch_produk' => 'string'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
    }
    public function token()
    {
        return $this->hasMany(Token::class, 'batch_id', 'id_batch');
    }
    public function paymentToken()
    {
        return $this->hasMany(PaymentToken::class, 'batch_produk_id', 'id_batch_produk');
    }
    public function hologram()
    {
        return $this->hasMany(Hologram::class, 'batch_produk_id', 'id_batch_produk');
    }
}