<?php

use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {

        $departamentos = [
            [ "05", "ANTIOQUIA" ],
            [ "08", "ATLANTICO" ],
            [ "11", "BOGOTA" ],
            [ "13", "BOLIVAR" ],
            [ "15", "BOYACA" ],
            [ "17", "CALDAS" ],
            [ "18", "CAQUETA" ],
            [ "19", "CAUCA" ],
            [ "20", "CESAR" ],
            [ "23", "CORDOBA" ],
            [ "25", "CUNDINAMARCA" ],
            [ "27", "CHOCO" ],
            [ "41", "HUILA" ],
            [ "44", "LA GUAJIRA" ],
            [ "47", "MAGDALENA" ],
            [ "50", "META" ],
            [ "52", "NARIÑO" ],
            [ "54", "N. DE SANTANDER" ],
            [ "63", "QUINDIO" ],
            [ "66", "RISARALDA" ],
            [ "68", "SANTANDER" ],
            [ "70", "SUCRE" ],
            [ "73", "TOLIMA" ],
            [ "76", "VALLE DEL CAUCA" ],
            [ "81", "ARAUCA" ],
            [ "85", "CASANARE" ],
            [ "86", "PUTUMAYO" ],
            [ "88", "SAN ANDRES" ],
            [ "91", "AMAZONAS" ],
            [ "94", "GUAINIA" ],
            [ "95", "GUAVIARE" ],
            [ "97", "VAUPES" ],
            [ "99", "VICHADA" ]
        ];

        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert([
                'codigo_dane' => $departamento[0],
                'name' => $departamento[1]
            ]);
        }
    }
}
