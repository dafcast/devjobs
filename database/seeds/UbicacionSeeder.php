<?php

use App\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubicacion::create([
            'ubicacion' => 'Remoto'
        ]);

        Ubicacion::create([
            'ubicacion' => 'Colombia'
        ]);

        Ubicacion::create([
            'ubicacion' => 'Mexico'
        ]);

        Ubicacion::create([
            'ubicacion' => 'USA'
        ]);

        Ubicacion::create([
            'ubicacion' => 'Canada'
        ]);

        Ubicacion::create([
            'ubicacion' => 'Argentina'
        ]);

        Ubicacion::create([
            'ubicacion' => 'Italia'
        ]);


    }
}
