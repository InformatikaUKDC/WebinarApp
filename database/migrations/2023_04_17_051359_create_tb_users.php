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
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->text('password');
            $table->string('no_wa', 255);
            $table->enum('gender', ['Pria','Wanita', 'Lainnya']);
            $table->text('address');
            $table->string('institution', 255);
            $table->unsignedBigInteger('role_id');
            $table->dateTime('email_verified_at')->nullable();
            $table->boolean('remember_login')->default(0);
            $table->boolean('is_online')->default(0);
            $table->dateTime('last_since');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_users');
    }
};
