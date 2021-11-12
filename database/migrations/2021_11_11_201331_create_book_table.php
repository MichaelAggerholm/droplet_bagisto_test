<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id')->length(10)->index();
            $table->string('ISBN')->length(255)->unique();
            $table->integer('publishers_id')->length(10)->unsigned();
            $table->integer('authors_id')->length(10)->unsigned();
            $table->integer('year')->length(10);
            $table->string('title')->length(255);
            $table->decimal('price', 19, 0);
            $table->integer('isDeleted')->default(0);
            $table->timestamps();
            $table->foreign('publishers_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
