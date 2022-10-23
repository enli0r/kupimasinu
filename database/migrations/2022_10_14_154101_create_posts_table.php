<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('korisnik_id');
            $table->unsignedBigInteger('kategorija_id');
            $table->string('naziv');
            $table->string('slug')->nullable();
            $table->decimal('cena', 8,2);
            $table->smallInteger('godina')->nullable();
            $table->boolean('koriscenost');
            $table->boolean('ispravnost');
            $table->boolean('zamena');
            $table->string('proizvodjac')->nullable();
            $table->text('opis');
            $table->string('mesto');
            $table->integer('postanski_broj');
            $table->string('kontakt');
            $table->boolean('garantovanje_tacnosti');
            $table->boolean('saglasnost');
            $table->boolean('odobren')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('posts');
    }
}
