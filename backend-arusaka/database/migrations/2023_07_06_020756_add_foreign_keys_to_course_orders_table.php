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
        Schema::table('course_orders', function (Blueprint $table) {
            $table->foreign(['courses_id'], 'fk_users_has_courses_courses1')->references(['id'])->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['payments_id'], 'fk_course_orders_payments1')->references(['id'])->on('payments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['users_id'], 'fk_users_has_courses_users')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_orders', function (Blueprint $table) {
            $table->dropForeign('fk_users_has_courses_courses1');
            $table->dropForeign('fk_course_orders_payments1');
            $table->dropForeign('fk_users_has_courses_users');
        });
    }
};
