<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJainpeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jainpeoples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('addr');
            $table->string('phone');
            $table->string('sts')->default('1');
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
        Schema::drop('jainpeoples');
    }
}
