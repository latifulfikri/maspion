<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('account_id');
            $table->foreign('account_id')->references('id')->on('account')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->date('date');
            $table->string('title',255);
            $table->string('desc',255);
            $table->string('pict',32);
            $table->integer('like');
            $table->integer('share');
            $table->tinyInteger('reported');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
