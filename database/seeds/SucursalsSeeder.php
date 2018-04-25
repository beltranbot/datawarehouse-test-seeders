<?php

use Illuminate\Database\Seeder;
use App\Departamento;
use Faker\Factory as Faker;

class SucursalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 20;
        $faker = Faker::create();
        $departamentos = Departamento::inRandomOrder()->get();

        for ($i = 0; $i < $n; $i++) { 
            $departamento = $departamentos->shuffle()->first();
            $municipio = $departamento->municipios->shuffle()->first();

            $sucursal_id = DB::table('sucursals')->insertGetId([
                'departamento_id' => $departamento->id,
                'municipio_id' => $municipio->id,
                'departamento' => $departamento->name,
                'municipio' => $municipio->name,
                'director' => $faker->name,
                'direccion' => $faker->address,
                'codigo_postal' => $faker->numberBetween($min = 10000, $max = 90000),
                'telefono' => $faker->phoneNumber,
                'direccion_web' => $faker->domainName
            ]);

            $m = $faker->numberBetween(5, 20);

            for ($j = 0; $j < $m; $j++) { 
    
                DB::table('empleados')->insert([
                    'sucursal_id' => $sucursal_id,
                    'nombre' => $faker->name,
                    'fecha_antiguedad' => $faker->dateTimeBetween(
                        $startDate = '-2 years',
                        $endDate = '-5 months',
                        $timezone = null)
                ]);    
            }

            $o = $faker->numberBetween(5000, 10000);

            for ($j = 0; $j< $o; $j++) {
    
                DB::table('vehiculos')->insert([
                    'sucursal_id' => $sucursal_id,
                    'matricula' => str_random(3) . '' . $faker->numberBetween(100, 999),
                    'modelo' => $faker->company,
                    'categoria' =>  str_random(2),
                    'num_seguro' =>  $faker->numberBetween(100000, 999999),
                    'precio' => $faker->numberBetween(10000000, 500000000),
                ]);
            }
        }
    }
}
