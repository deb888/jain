<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientservices', function (Blueprint $table) {
            $table->increments('id');
			$table->longText('address');
			$table->longText('address_lat');
			$table->longText('address_long');
			$table->longText('what_issue');
			$table->longText('pictures');
			$table->longText('Notes');
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
        Schema::drop('clientservices');
    }
}
