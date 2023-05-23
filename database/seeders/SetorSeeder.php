<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Atendente', 'Garçom', 'Estoque', 'Administração', 'Cozinha'];
        $contador = 0;

        foreach(\range(1,5) as $index){
            DB::table('setor')->insert([
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