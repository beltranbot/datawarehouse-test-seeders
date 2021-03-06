<?php

use Illuminate\Database\Seeder;
use App\Sucursal;
use Faker\Factory as Faker;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $n = 5000;
        $sucursals = Sucursal::inRandomOrder()->get();

        for ($i = 0; $i< $n; $i++) {
            $sucursal = $sucursals->shuffle()->first();

            DB::table('vehiculos')->insert([
                'sucursal_id' => $sucursal->id,
                'matricula' => str_random(3) . '' . $faker->numberBetween(100, 999),
                'modelo' => $faker->company,
                'categoria' =>  str_random(2),
                'num_seguro' =>  $faker->numberBetween(100000, 999999),
                'precio' => $faker->numberBetween(10000000, 1000000000)
            ]);
        }
    }
}
