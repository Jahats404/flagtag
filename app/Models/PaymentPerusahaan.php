<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'payment_perusahaan';
    protected $primaryKey = 'id_payment';
    protected $guarded = [];
    protected $casts = [
        'id_payment' => 'string',
    ];

    public function brandOwner()
    {
        return $this->belongsTo(BrandOwner::class, 'perusahaan_id', 'id_perusahaan');
    }
}