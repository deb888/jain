<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblhowitworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblhowitworks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('step_one_hed');
            $table->text('step_one_cont');
            $table->text('step_two_hed');
            $table->text('step_two_cont');
            $table->text('step_three_hed');
            $table->text('step_thres_cont');
            $table->integer('sts')->default('1');
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
        Schema::drop('tblhowitworks');
    }
}
