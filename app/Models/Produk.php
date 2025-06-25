<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $guarded = [];
    protected $casts = [
        'id_produk' => 'string',
    ];


    public function brandOwner()
    {
        return $this->belongsTo(BrandOwner::class, 'perusahaan_id', 'id_perusahaan');
    }
    public function batchProduk()
    {
        return $this->hasMany(BatchProduk::class, 'produk_id', 'id_produk');
    }
}