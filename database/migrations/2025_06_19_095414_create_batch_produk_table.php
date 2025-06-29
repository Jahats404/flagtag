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
        Schema::create('batch_produk', function (Blueprint $table) {
            $table->string('id_batch_produk')->primary()->unique();
            $table->string('no_batch_produk');
            $table->date('tanggal_produksi');
            $table->date('tanggal_kadaluarsa');
            $table->string('tempat_produksi');
            $table->string('quantity');
            $table->string('status')->nullable()->default('Pending');
            $table->integer('nominal_token')->nullable();

            $table->string('produk_id');
            $table->foreign('produk_id')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_produk');
    }
};