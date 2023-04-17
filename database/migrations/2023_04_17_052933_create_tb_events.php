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
        Schema::create('tb_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->text('image');
            $table->string('title', 255);
            $table->text('description');
            $table->text('background');
            $table->enum('type_activity', ['Online', 'Offline']);
            $table->longText('speaker');
            $table->boolean('is_published');
            $table->text('link_feedback');
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
        Schema::dropIfExists('tb_events');
    }
};
