<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TiemposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $dates = [];
        $n = 200;
        for ($i = 0; $i < $n; $i++) { 
            $dates[] = $faker->dateTimeBetween(
                $startDate = '-2 years',
                $endDate = 'now',
                $timezone = null
            );
        }
        usort($dates, function ($a, $b) {
            $c = $a->format('Y-m-d-H-i-s');
            $d = $b->format('Y-m-d-H-i-s');
            
            if ($c < $d) {
                return -1;
            } else if ($c > $d) {
                return 1;
            } else {
                return 0;
            }
        });

        foreach ($dates as $date) {
            DB::table('tiempos')->insert([
                'fecha' => $date
            ]);
        }
    }

    
}
