<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Pelicula;
use App\Models\PeliculaActor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculaActorSeeder extends Seeder
{


    // public function run()
    // {
    //     $peliculas = Pelicula::all();
    //     $peliculas->each( function($peli){
    //         $actores = Actor::all()->toArray();
    //         shuffle($actores);
    //         $random=random_int(1,3);

    //         for ($i = 1; $i <= $random; $i++) {

    //             PeliculaActor::create([
    //                 'pelicula_id' => $peli->id,
    //                 'actores_id'=> $actores[$i]['id']
    //             ]);
    //         }
    //     });
    // }

    public function run()
    {

        $movies = Pelicula::all();

        // Populate the pivot table
        Actor::all()->each(function ($actor) use ($movies) {
            $actor->peliculas()->attach(
                $movies->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }





}
