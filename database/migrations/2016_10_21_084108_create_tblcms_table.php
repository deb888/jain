<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('howitworks_tagline');
            $table->text('aboutus_tagline');
            $table->text('testimonial_tagline');
            $table->text('ourpartner_tagline');
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
        Schema::drop('tblcms');
    }
}
