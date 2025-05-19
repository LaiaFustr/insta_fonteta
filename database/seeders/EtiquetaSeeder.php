<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            [
                'nombre'=> '#juliorules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre'=> '#adios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre'=> '#hola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre'=> '#test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
    }
}
