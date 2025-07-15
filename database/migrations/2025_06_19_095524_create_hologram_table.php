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
        Schema::create('hologram', function (Blueprint $table) {
            $table->string('id_hologram')->primary()->unique();
            $table->string('kode_hologram');
            $table->text('ipfs_url')->nullable();
            $table->string('status')->default('Inactive'); // 'active', 'inactive', 'claimed'
            $table->string('status_token')->nullable(); // 'active', 'inactive', 'claimed'
            $table->text('lokasi_scan')->nullable();
            
            $table->string('batch_produk_id');
            $table->foreign('batch_produk_id')->references('id_batch_produk')->on('batch_produk')->onDelete('cascade');
            
            $table->string('customer_claim_id')->nullable();
            $table->foreign('customer_claim_id')->references('id_customer')->on('customer')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token');
    }
};