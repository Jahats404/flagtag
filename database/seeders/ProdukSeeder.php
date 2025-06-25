<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'id_produk' => 'prdct_685ae934edd7e',
            'nama_produk' => 'Susu Sapi',
            'nomor_sku' => '2994654110',
            'kategori_produk' => 'Makanan',
            'komposisi_produk' => 'Susu, Tepung, Jahe',
            'deskripsi_produk' => 'Susu, Tepung, Jahe',
            'perusahaan_id' => 'bo_1234567890',
        ]);
        Produk::create([
            'id_produk' => 'prdct_685af07098c64',
            'nama_produk' => 'Ikrak',
            'nomor_sku' => '99283114311',
            'kategori_produk' => 'Kebersihan',
            'komposisi_produk' => 'Bambu Suwir, Rapiah, Bambu Utuh',
            'deskripsi_produk' => 'Bambu Suwir, Rapiah, Bambu Utuh',
            'perusahaan_id' => 'bo_1234567890',
        ]);
        Produk::create([
            'id_produk' => 'prdct_685af0b00bc33',
            'nama_produk' => 'Puyer 66',
            'nomor_sku' => '6188107312',
            'kategori_produk' => 'Herbal',
            'komposisi_produk' => 'Bubuk Mesiu, Api, Kertas',
            'deskripsi_produk' => 'Bubuk Mesiu, Api, Kertas',
            'perusahaan_id' => 'bo_1234567890',
        ]);
    }
}