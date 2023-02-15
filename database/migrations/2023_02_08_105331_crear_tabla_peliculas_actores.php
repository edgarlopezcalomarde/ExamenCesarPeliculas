<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('peliculas_actores', function (Blueprint $table) {
            $table->unsignedBigInteger("pelicula_id");
            $table->unsignedBigInteger("actor_id");
            // $table->foreign("pelicula_id")->references("id")->on("peliculas");
            // $table->foreign("actor_id")->references("id")->on("actores");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('peliculas_usuarios');
    }
};
