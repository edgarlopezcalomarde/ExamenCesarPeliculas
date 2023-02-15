<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->integer("año");
            $table->integer("duracion");
            $table->unsignedBigInteger("director_id");
            $table->foreign("director_id")->references("id")->on("directores");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
};
