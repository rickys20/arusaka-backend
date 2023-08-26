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
        Schema::create('live_practice_orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->unsignedBigInteger('live_practice_id');
            $table->enum('status', ['locked', 'unlocked'])->default('locked');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('live_practice_id')
                ->references('id')
                ->on('live_practices')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_practice_orders');
    }
};
