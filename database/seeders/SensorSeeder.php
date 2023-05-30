<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Sensor Um', 'Sensor Dois', 'Sensor três', 'Sensor Quatro', 'Sensor Cinco'];
        $contador = 0;

        foreach(\range(1,5) as $index){
            DB::table('sensor')->insert([
                'nome'=> $nomes[$contador]
            ]);

            $contador++;

            // Reinicia o contador quando todos os nomes forem usados
            if ($contador >= count($nomes)) {
                $contador = 0;
            }
        }
    }
}
