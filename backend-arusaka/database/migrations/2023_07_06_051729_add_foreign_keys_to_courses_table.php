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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign(['partners_id'], 'fk_courses_partners1')->references(['id'])->on('partners')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['categories_id'], 'fk_courses_categories1')->references(['id'])->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('fk_courses_partners1');
            $table->dropForeign('fk_courses_categories1');
        });
    }
};
