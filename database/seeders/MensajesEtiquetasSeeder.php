<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajesEtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mensajes_etiquetas')->insert([
            [
                'mensaje_id' => 1,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'etiqueta_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'etiqueta_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'etiqueta_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
