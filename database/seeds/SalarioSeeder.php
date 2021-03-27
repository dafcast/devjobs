<?php

use App\Salario;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salario::create([
            'salario' => '500 USD'
        ]);

        Salario::create([
            'salario' => '1000 USD'
        ]);

        Salario::create([
            'salario' => '3000 USD'
        ]);

        Salario::create([
            'salario' => '5000 USD'
        ]);

        Salario::create([
            'salario' => '10000 USD'
        ]);
    }
}
