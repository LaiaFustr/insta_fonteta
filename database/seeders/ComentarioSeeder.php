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
                'content' => 'Comentario 1 del usuario 2 sobre el mensaje 1.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'user_id' => 1,
                'content' => 'Comentario 2 del usuario 1 sobre el mensaje 2.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'user_id' => 2,
                'content' => 'Comentario 3 del usuario 2 sobre el mensaje 3.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'user_id' => 1,
                'content' => 'Comentario 4 del usuario 1 sobre el mensaje 4.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 2,
                'content' => 'Comentario 5 del usuario 2 sobre el mensaje 5.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 1,
                'user_id' => 1,
                'content' => 'Comentario 6 del usuario 1 sobre su propio mensaje.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 2,
                'user_id' => 2,
                'content' => 'Comentario 7 del usuario 2 sobre su propio mensaje.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 3,
                'user_id' => 1,
                'content' => 'Comentario 8 del usuario 1 sobre el mensaje 3.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 4,
                'user_id' => 2,
                'content' => 'Comentario 9 del usuario 2 sobre el mensaje 4.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mensaje_id' => 5,
                'user_id' => 1,
                'content' => 'Comentario 10 del usuario 1 cerrando la lista.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
