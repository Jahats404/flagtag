<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hologram extends Model
{
    use HasFactory;

    protected $table = 'hologram';
    protected $primaryKey = 'id_hologram';
    protected $guarded = [];
    protected $casts = [
        'id_hologram' => 'string',
        'produk_id' => 'string',
    ];

    public function batchProduk()
    {
        return $this->belongsTo(BatchProduk::class, 'batch_produk_id', 'id_batch_produk');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_claim_id', 'id_customer');
    }
    public function token()
    {
        return $this->hasOne(Token::class, 'hologram_id', 'id_hologram');
    }
}