<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categori', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedBigInteger('categori_id');
            $table->foreign('categori_id')->references('id')->on('categories');
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
        Schema::dropIfExists('book_categori');
    }
}
