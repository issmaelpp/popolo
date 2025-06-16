<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = [
            ['Barrio 60 Viviendas', 'barrio-60-viviendas', [[-29.7040720, -57.1206808]]],
            ['Barrio 80 Viviendas Grupo 1', 'barrio-80-viviendas-grupo-1', [[-29.7058577, -57.1226387]]],
            ['Barrio 17 de Agosto', 'barrio-17-de-agosto', [[-29.7042603, -57.1238555]]],
            ['Barrio Solidario', 'barrio-solidario', [[-29.7075025, -57.1122791]]],
            ['Barrio B60 Viviendas', 'barrio-b-60-viviendas', [[-29.7118716, -57.1212199]]],
            ['Barrio Pluri Anual (50 viv)', 'barrio-plurali-anual-50-viviendas', [[-29.7093261, -57.1288357]]],
            ['Barrio 508 Viviendas', 'barrio-508-viviendas', [[-29.7113247, -57.1194956]]],
            ['Barrio Costanera', 'barrio-costanera', [[-29.7229214, -57.0892915]]],
            ['Barrio Lujan', 'barrio-lujan', [[-29.7066424, -57.1264058]]],
            ['Barrio Joaquin Madariaga 17 de Agosto', 'barrio-joaquin-madariaga-17-de-agosto', [[-29.7037156, -57.1241159]]],
            ['Barrio Catamarca', 'barrio-catamarca', [[-29.7057786, -57.0817412]]],
            ['Barrio 50 Viviendas', 'barrio-50-viviendas', [[-29.7105354, -57.1277728]]],
            ['Barrio Las Flores', 'barrio-las-flores', [[-29.7138304, -57.1294141]]],
            ['Barrio Presidente Frondizi (100 viv)', 'barrio-presidente-frondizi-100-viviendas', [[-29.7131810, -57.1251796]]],
            ['Barrio Libertador General San Martin', 'barrio-libertador-general-san-martin', [[-29.7166454, -57.1255058]]],
            ['Barrio Caa Guazu', 'barrio-caa-guazu', [[-29.7193000, -57.1209480]]],
            ['Barrio Terminal', 'barrio-terminal', [[-29.7223949, -57.0963616]]],
            ['Barrio de Sub-Oficiales Yapeyu', 'barrio-de-sub-oficiales-yapeyu', [[-29.7159519, -57.0974415]]],
            ['Barrio Simeon Paiba', 'barrio-simeon-paiba', [[-29.7101763, -57.1177492]]],
            ['Barrio Monte Verde', 'barrio-monte-verde', [[-29.7186551, -57.1030969]]],
            ['Barrio 11 de Septiembre', 'barrio-11-de-septiembre', [[-29.7080198, -57.1105913]]],
            ['Barrio Santa Rosa', 'barrio-santa-rosa', [[-29.7117185, -57.1037306]]],
            ['Barrio Chaquito', 'barrio-chaquito', [[-29.7048357, -57.0940792]]],
            ['Barrio Picaflor', 'barrio-picaflor', [[-29.7093347, -57.0990836]]],
            ['Barrio 154 Viviendas', 'barrio-154-viviendas', [[-29.7054264, -57.1188305]]],
            ['Barrio 99 Viviendas', 'barrio-99-viviendas', [[-29.7069743, -57.1213280]]],
            ['Barrio 132 Viv.', 'barrio-132-viviendas', [[-29.7142608, -57.1089011]]],
            ['Barrio 508 Sector 300', 'barrio-508-sector-300', null],
            ['Barrio militar General San Martín', 'barrio-militar-general-san-martin', null],
            ['Barrio 508 Viviendas Sec. 300', 'barrio-508-viviendas-sec-300', null],
            ['Barrio 508 Viviendas Sec. 208', 'barrio-508-viviendas-sec-208', null],
            ['Barrio Santa Barbara', 'barrio-santa-barbara', null],
            ['Barrio 255 Viviendas', 'barrio-255-viviendas', null],
            ['Barrio Facundo Quiroga', 'barrio-facundo-quiroga', null],
            ['Chacra 213', 'chacra-213', [[-29.7161601, -57.1232503]]],
            ['Centro de la Ciudad', 'centro-de-la-ciudad', [[-29.7125500, -57.0880286]]],
            ['50 VIV G1,2,3,4', '50-viv-g1-2-3-4', [[-29.7027539, -57.1254498]]],
        ];

        foreach ($collection as $key => $value) {
            DB::table('neighborhoods')->insert([
                'name' => $value[0],
                'slug' => $value[1],
                'coordinate' => json_encode($value[2])
            ]);
        }
    }
}
