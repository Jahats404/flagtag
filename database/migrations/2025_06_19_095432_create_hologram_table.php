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
            $table->text('hologram_image');
            $table->string('status'); // 'active', 'inactive', 'claimed'
            
            $table->string('batch_produk_id');
            $table->foreign('batch_produk_id')->references('id_batch_produk')->on('batch_produk')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id_minted')->nullable();
            $table->foreign('user_id_minted')->references('id')->on('users');
            $table->unsignedBigInteger('user_id_claimed')->nullable();
            $table->foreign('user_id_claimed')->references('id')->on('users');
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