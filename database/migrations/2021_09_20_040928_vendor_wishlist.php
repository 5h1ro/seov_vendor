<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VendorWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_wishlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned();
            $table->integer('id_vendor')->unsigned();
            $table->timestamps();
        });

        Schema::table('vendor_wishlists', function (Blueprint $table) {
            $table->foreign('id_client', 'id_client_fk_08')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_vendor', 'idVendor_fk_09')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
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
