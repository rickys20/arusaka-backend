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
            $table->string('order_id')->nullable()->unique('order_id_UNIQUE');
            $table->string('transaction_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('payment_type')->nullable();
            $table->timestamp('expiry_time')->nullable();
            $table->string('url')->nullable();
            $table->enum('status', ['authorize', 'capture', 'settlement', 'deny', 'pending', 'cancel', 'refund', 'partial_refund', 'chargeback', 'partial_chargeback', 'expire', 'failure'])->default('pending');
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
