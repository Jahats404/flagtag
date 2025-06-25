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
        Schema::create('payment_token', function (Blueprint $table) {
            $table->string('id_payment_token')->primary()->unique();
            $table->bigInteger('nominal');
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('status_pembayaran')->default('pending');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('batch_produk_id');
            $table->foreign('batch_produk_id')->references('id_batch_produk')->on('batch_produk')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_token');
    }
};