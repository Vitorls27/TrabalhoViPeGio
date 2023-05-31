<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['08:3A:F2:50:BD:1C','38:2B:78:03:A6:32','38:2B:78:03:A8:38','48:3F:DA:0D:C6:B6','68:C6:3A:E1:63:48','84:0D:8E:B0:68:8E','84:0D:8E:B0:82:5C','CC:50:E3:05:12:97','CC:50:E3:05:18:79','CC:50:E3:05:19:BA','CC:50:E3:3B:FE:E9','CC:50:E3:3C:0C:99','CC:50:E3:3C:1B:40','CC:50:E3:3C:1E:52','DC:4F:22:11:05:A7','E8:DB:84:98:B5:DA','E8:DB:84:DD:DB:80'];
        $contador = 0;
        $fake = Faker::create("pt_BR");

        foreach(\range(1,17) as $index){
            DB::table('mac')->insert([
                'nome'=> $nomes[$contador],
                'contador'=> $fake->numberBetween(1,99)
            ]);

            $contador++;

            // Reinicia o contador quando todos os nomes forem usados
            if ($contador >= count($nomes)) {
                $contador = 0;
            }
        }
    }
}
