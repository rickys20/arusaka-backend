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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('role', ['USER', 'ADMIN', 'SUPERADMIN'])->default('USER');
            $table->string('mobile_phone')->nullable();
            $table->text('address')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
