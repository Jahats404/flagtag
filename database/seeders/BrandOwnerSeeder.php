<?php

namespace Database\Seeders;

use App\Models\BrandOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandOwner::create([
            'id_perusahaan' => 'bo_1234567890',
            'nama_perusahaan' => 'Sepuluh Naga',
            'alamat_perusahaan' => 'Jl. Raya No. 10, Jakarta',
            'user_id' => 2,
        ]);
    }
}