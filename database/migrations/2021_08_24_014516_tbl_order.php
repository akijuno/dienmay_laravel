<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//chi tiet don dat hang
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('customer_id');//nguoi dat 
            $table->integer('shipping_id');//dia chi
            $table->integer('payment_id');//hinh thuc thanh toan
            $table->float('order_total');//tong don hang da mua la bn tien
            $table->integer('order_status');//tinh trang don hang
           
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
        Schema::drop('tbl_order');
    }
}
