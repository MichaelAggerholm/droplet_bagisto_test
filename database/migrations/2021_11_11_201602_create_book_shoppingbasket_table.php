<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookShoppingBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_shoppingbasket', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->integer('book_id')->unsigned();
            $table->integer('shoppingbasket_id')->unsigned();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('shoppingbasket_id')->references('id')->on('shoppingbaskets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_shoppingbasket');
    }
}
