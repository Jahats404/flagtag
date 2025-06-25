<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandOwner extends Model
{
    use HasFactory;

    protected $table = 'brand_owner';
    protected $primaryKey = 'id_perusahaan';
    protected $guarded = [];

    protected $casts = [
        'id_perusahaan' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function paymentPerusahaan()
    // {
    //     return $this->hasMany(PaymentPerusahaan::class, 'perusahaan_id', 'id_perusahaan');
    // }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'perusahaan_id', 'id_perusahaan');
    }
}