<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkedCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marked_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('korisnik_id');
            $table->unsignedBigInteger('kategorija_id');
            $table->timestamps();

            $table->primary(['korisnik_id','kategorija_id']);

            $table->foreign('korisnik_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategorija_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marked_categories');
    }
}
