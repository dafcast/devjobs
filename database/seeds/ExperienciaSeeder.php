<?php

use App\Experiencia;
use Illuminate\Database\Seeder;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experiencia::create([
            'experiencia' => '0 a 6 meses'
        ]);

        Experiencia::create([
            'experiencia' => '6 meses a 1 año'
        ]);

        Experiencia::create([
            'experiencia' => '1 año a 3 años'
        ]);

        Experiencia::create([
            'experiencia' => '3 a 6 años'
        ]);

        Experiencia::create([
            'experiencia' => '6 a 10 años'
        ]);
    }
}
