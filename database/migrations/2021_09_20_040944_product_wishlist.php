<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wishlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->timestamps();
        });

        Schema::table('product_wishlists', function (Blueprint $table) {
            $table->foreign('id_client', 'id_client_fk_10')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_product', 'id_product_fk_11')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
