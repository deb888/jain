<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbltestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltestimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Upper_text_testi');
            $table->string('topic_name');
            $table->string('topicperson_image');
            $table->string('topicperson_location');
            $table->string('topicperson_designation');
            $table->text('topic_description');
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
        Schema::drop('tbltestimonials');
    }
}
