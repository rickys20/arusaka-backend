<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('reference_number')->nullable();
            $table->integer('price')->nullable();
            $table->string('unique_code')->nullable()->unique('unique_code_UNIQUE');
            $table->enum('status', ['FINISHED', 'PROGRESS', 'EXPIRED'])->default('PROGRESS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
