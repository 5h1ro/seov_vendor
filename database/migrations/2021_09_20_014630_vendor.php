<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->string('city');
            $table->integer('sold')->default(0);
            $table->string('image')->default('public/user_avatar.png');
            $table->string('rating')->default(0);
            $table->integer('id_user')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->timestamps();
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('id_category', 'id_category_fk_01')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user', 'id_user_fk_04')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
