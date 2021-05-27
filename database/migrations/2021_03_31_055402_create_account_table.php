<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email',128);
            $table->string('pass',255);
            $table->string('name',32);
            $table->string('joe',128);
            $table->string('gender',8);
            $table->string('pict',32);
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('role')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('token', 255);
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
        Schema::dropIfExists('account');
    }
}
