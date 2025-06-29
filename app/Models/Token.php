<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'token';
    protected $primaryKey = 'id_token';
    protected $guarded = [];
    protected $casts = [
        'id_token' => 'string',
    ];

    public function hologram()
    {
        return $this->belongsTo(Hologram::class, 'hologram_id', 'id_hologram');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_claim_id', 'id_customer');
    }
}