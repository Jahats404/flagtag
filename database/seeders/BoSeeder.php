<?php

namespace Database\Seeders;

use App\Models\BrandOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandOwner::create([
            'id_perusahaan' => 'BO-0001',
            'nama_perusahaan' => 'PT. Contoh Perusahaan',
            'alamat' => 'Jl. Contoh Alamat No. 1, Jakarta',
            'telepon' => '021-12345678',
            'email' => 'asd',
            'user_id' => 2, // Pastikan user dengan ID 1 sudah ada
        ]);
    }
}