<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->nullable(false);
            $table->integer('director')->unsigned()->nullable(false);
            $table->string('discribe')->nullable(true);
            $table->tinyInteger('rate')->unsigned()->nullable(true);
            $table->enum('released',[0,1]);
            $table->timestamp('released_at')->nullable(true);
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
        Schema::dropIfExists('table_movies');
    }
}
