<?php

use Illuminate\Database\Seeder;
use App\Tiempo;
use App\Vehiculo;
use App\Cliente;
use App\Sucursal;
use App\Empleado;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 100000;
        $tiempos = Tiempo::inRandomOrder()->get();
        $clientes = Cliente::inRandomOrder()->get();
        $sucursals = Sucursal::inRandomOrder()->get();
        for ($i = 0; $i < $n; $i++) { 
            $tiempo = $tiempos->random();
            $cliente = $clientes->random();
            $sucursal = $sucursals->random();
            
            $vehiculo = Vehiculo::where('vendido', false)
                ->where('sucursal_id', $sucursal->id)
                ->inRandomOrder()->first();
            $vehiculo->vendido = true;
            $vehiculo->save();

            $empleado = Empleado::where('sucursal_id', $sucursal->id)
                ->inRandomOrder()->first();

            DB::table('ventas')->insert([
                'tiempo_id' => $tiempo->id,
                'vehiculo_id' => $vehiculo->id,
                'cliente_id' => $cliente->id,
                'sucursal_id' => $sucursal->id,
                'empleado_id' => $empleado->id,
                'precio' => $vehiculo->precio
            ]);
        }
    }
}
