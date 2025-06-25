<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_modul';
    protected $table = 'modul';
    protected $guarded = [];
    protected $casts = [
        'id_modul' => 'string'
    ];
    
}