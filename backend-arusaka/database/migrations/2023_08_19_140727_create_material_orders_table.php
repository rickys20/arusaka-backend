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
        Schema::create('material_orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('courses_id');
            $table->Integer('material_id');
            $table->Integer('user_id');
            $table->enum('status', ['locked', 'unlocked'])->default('locked');
            $table->timestamps();

            // Ensure that the data type matches the 'id' column in the 'materials' table
            $table->foreign('courses_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->foreign('material_id')
                ->references('id')
                ->on('materials')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_orders');
    }
};
