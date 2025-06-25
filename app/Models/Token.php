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

    public function batchProduk()
    {
        return $this->belongsTo(BatchProduk::class, 'batch_id', 'id_batch');
    }

    public function userMinted()
    {
        return $this->belongsTo(User::class, 'user_id_minted', 'id');
    }
    public function userClaimed()
    {
        return $this->belongsTo(User::class, 'user_id_claimed', 'id');
    }
}