<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('post')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('account_id');
            $table->foreign('account_id')->references('id')->on('account')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('comment', 255);
            $table->integer('like');
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
        Schema::dropIfExists('comment');
    }
}
