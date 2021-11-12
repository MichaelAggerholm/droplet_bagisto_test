<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_warehouse', function (Blueprint $table) {
            $table->increments('id')->length(10)->index();
            $table->integer('books_id')->length(10)->unsigned();
            $table->integer('warehouses_id')->length(10)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_warehouse');
    }
}
