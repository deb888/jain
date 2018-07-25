<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblbannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbanners', function (Blueprint $table) {
            $table->increments('id');
            $table->text('upper_iamge_content');
            $table->text('lower_iamge_content');
            $table->text('banner_image');
            $table->integer('sts')->default('1');
            $table->integer('order');
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
        Schema::drop('tblbanners');
    }
}
