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
        Schema::create('quiz_orders', function (Blueprint $table) {
            $table->id();
            $table->text('question')->nullable();
            $table->text('answers')->nullable();
            $table->Integer('user_id');
            $table->unsignedBigInteger('quiz_id');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->double('score')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('quiz_id')
                ->references('id')
                ->on('quizzes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_orders');
    }
};
