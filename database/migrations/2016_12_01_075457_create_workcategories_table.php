<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_nm');
            $table->integer('cat_type');
            $table->string('cat_desc');
            $table->string('cat_img');
            $table->integer('sts');
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
        Schema::drop('workcategories');
    }
}
