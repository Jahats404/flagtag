<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk')->primary()->unique();
            $table->string('nama_produk');
            $table->string('nomor_sku');
            $table->string('kategori_produk');
            $table->string('komposisi_produk');
            $table->string('deskripsi_produk')->nullable();

            $table->string('perusahaan_id');
            $table->foreign('perusahaan_id')->references('id_perusahaan')->on('brand_owner')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};