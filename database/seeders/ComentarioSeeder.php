<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comentarios')->insert([
            [
                'mensaje_id' => 1,
                'user_id' => 2,
                'content' => 'Hola caracola! Voy a enviar un mensaje.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 1,
                'user_id' => 1,
                'content' => 'Ah, eso está muy pero que muy bien.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'user_id' => 1,
                'content' => 'Adiós! <3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'user_id' => 2,
                'content' => 'Hahahhaha, la cuestión es saludar! Ánimo, lo debes estar pasando regular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'user_id' => 1,
                'content' => 'La verdad es que sí, pero intento ser positiva. Seguimos testeando. Gracias por el ánimo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'user_id' => 1,
                'content' => 'Eso! siempre digo que puedo con todo, aunque llore un poco antes XD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 2,
                'content' => 'Buen diaaa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 1,
                'content' => 'Gracias, gracias!, igualmente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 1,
                'content' => 'Quiero comentarte el martes que he tenido, hablamos en el tiempo de comida en la empresa. Me van a contratar!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 2,
                'content' => 'Que diceees! Luego me cuentas ^-^',
                'created_at' => now(),
                'updated_at' => now(),
            ],

           
        ]);
    }
}
