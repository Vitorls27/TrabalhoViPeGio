<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Salgado', 'Doce', 'Bebida'];
        $contador = 0;

        foreach(\range(1,3) as $index){
            DB::table('tipo')->insert([
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

