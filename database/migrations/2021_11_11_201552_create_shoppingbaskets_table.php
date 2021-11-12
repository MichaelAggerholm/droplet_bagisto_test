<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingbaskets', function (Blueprint $table) {
            $table->increments('id')->length(10)->index();
            $table->integer('customers_id')->length(10)->unsigned();
            $table->integer('isDeleted')->default(0);
            $table->timestamps();
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppingbaskets');
    }
}
