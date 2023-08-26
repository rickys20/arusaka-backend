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
        Schema::create('live_practices', function (Blueprint $table) {
            $table->id();
            $table->Integer('courses_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('partiture'); //url gambar not
            $table->time('time')->nullable();
            $table->enum('status', ['locked', 'unlocked'])->default('locked');
            $table->timestamps();
            $table->foreign('courses_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_practices');
    }
};
