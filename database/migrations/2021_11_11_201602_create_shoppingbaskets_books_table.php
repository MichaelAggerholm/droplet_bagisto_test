<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingBasketsBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingbaskets_books', function (Blueprint $table) {
            $table->increments('id')->length(10)->index();
            $table->integer('customers_id')->length(10)->unsigned();
            $table->integer('books_id')->length(10)->unsigned();
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
        Schema::dropIfExists('shoppingbaskets_books');
    }
}
