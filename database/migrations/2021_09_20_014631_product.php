<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_vendor')->unsigned();
            $table->integer('price');
            $table->string('amount');
            $table->longText('detail');
            $table->string('location');
            $table->integer('sold')->default(0);
            $table->string('rating')->default(0);
            $table->string('image')->default('public/user_avatar.png');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('id_vendor', 'id_vendor_fk_02')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
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
