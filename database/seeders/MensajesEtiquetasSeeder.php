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
                'mensaje_id' => 1,
                'etiqueta_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'etiqueta_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'etiqueta_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'etiqueta_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'etiqueta_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'etiqueta_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'etiqueta_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'etiqueta_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'etiqueta_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'etiqueta_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 6,
                'etiqueta_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 6,
                'etiqueta_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 6,
                'etiqueta_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
