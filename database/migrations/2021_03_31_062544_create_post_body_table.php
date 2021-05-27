<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostBodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_body', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('post')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('pict', 128);
            $table->string('sub_title', 255);
            $table->text('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_bodies');
    }
}
