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
        Schema::create('course_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_id')->index('fk_users_has_courses_users_idx');
            $table->integer('courses_id')->index('fk_users_has_courses_courses1_idx');
            $table->integer('payments_id')->index('fk_course_orders_payments1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_orders');
    }
};
