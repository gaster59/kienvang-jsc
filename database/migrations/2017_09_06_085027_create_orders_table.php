<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');

            /*
             * thong tin khach hang khi chua la thanh vien: ten khach hang, dia chi, so dien thoai, email
             */
            $table->text('info_customer');

            $table->string('code');
            $table->integer('total');
            $table->string('ship_address');

            /*
             * 0: khong hien thi
             * 1: hien thi: don hang chua thanh toan
             * 2: hien thi: don hang da duoc thanh toan
             */
            $table->smallInteger('status');

            /*
             * Neu da la thanh vien cua website thi khi mua hang, field nay se co gia tri
             */
            $table->integer('user_id');

            // thong tin chung cua don hang
            $table->text('info');

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
		Schema::drop('orders');
	}

}
