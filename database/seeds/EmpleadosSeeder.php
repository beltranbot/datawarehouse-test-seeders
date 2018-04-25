<?php

use Illuminate\Database\Seeder;
use App\Sucursal;
use Faker\Factory as Faker;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) { 
            $sucursal = Sucursal::inRandomOrder()->first();

            DB::table('empleados')->insert([
                'sucursal_id' => $sucursal->id,
                'nombre' => $faker->name,
                'fecha_antiguedad' => $faker->dateTimeBetween(
                    $startDate = '-2 years',
                    $endDate = '-5 months',
                    $timezone = null)
            ]);


        }
    }
}
