<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mensajes')->insert([
            [
                'user_id' => 1,
                'content' => 'Hola, este es el primer mensaje del usuario 1. #juliorules',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'content' => 'Este es el segundo mensaje, del usuario 2. #adios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'content' => 'Otro mensaje del usuario 1, probando. #hola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'content' => 'Mensaje adicional desde el usuario 2. #test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'content' => 'Último mensaje de prueba para el usuario 1. #test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
