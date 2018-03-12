<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('description', 500);
            $table->string('avatar', 255);
            $table->integer('price');

            /*
             * 0: khong duoc hien thi
             * 1: duoc hien thi
             */
            $table->smallInteger('status');
            $table->integer('user_id');
            $table->integer('category_id');

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
		Schema::drop('expenses');
	}

}
