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
        Schema::create('payment_perusahaan', function (Blueprint $table) {
            $table->string('id_payment')->primary()->unique();
            $table->bigInteger('nominal');
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            
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
        Schema::dropIfExists('payment_perusahaan');
    }
};