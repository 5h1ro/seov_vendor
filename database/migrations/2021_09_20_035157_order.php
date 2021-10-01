<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('amount');
            $table->integer('total');
            $table->dateTime('event_date');
            $table->string('status')->default('Belum Dibayar');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('id_client', 'id_client_fk_06')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_product', 'id_product_fk_07')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
