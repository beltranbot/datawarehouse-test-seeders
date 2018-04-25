<?php

use Illuminate\Database\Seeder;
use App\Departamento;
use Faker\Factory as Faker;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) { 
            $departamento = Departamento::inRandomOrder()->first();
            $municipio = $departamento->municipios->shuffle()->first();

            DB::table('clientes')->insert([
                'departamento_id' => $departamento->id,
                'municipio_id' => $municipio->id,
                'departamento' => $departamento->name,
                'municipio' => $municipio->name,
                'nombre' => $faker->name,
                'direccion' => $faker->address,
                'codigo_postal' => $faker->numberBetween($min = 10000, $max = 90000),
                'telefono' => $faker->phoneNumber
            ]);            
        }
    }
}
