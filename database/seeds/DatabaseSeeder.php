<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(TiemposSeeder::class);
        $this->call(SucursalsSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(VehiculosSeeder::class);
    }
}
