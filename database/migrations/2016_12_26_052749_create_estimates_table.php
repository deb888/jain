<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
		$table->increments('id');
		$table->integer('cat_id');
		$table->integer('user_id');
		$table->decimal('tot_price', 10, 2);
		$table->decimal('width', 10, 2);
		$table->decimal('height', 10, 2);
		$table->decimal('unit_price', 10, 2);
		$table->longText('first_des');
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
        Schema::drop('estimates');
    }
}
