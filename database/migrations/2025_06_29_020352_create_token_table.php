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
        Schema::create('token', function (Blueprint $table) {
            $table->string('id_token')->primary()->unique();
            $table->string('status')->default('Active');

            $table->string('hologram_id');
            $table->foreign('hologram_id')->references('id_hologram')->on('hologram')->onDelete('cascade');
            
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