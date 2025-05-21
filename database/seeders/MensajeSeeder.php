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
            [//1
                'user_id' => 1,
                'content' => 'Buenas a #todos, mi nombre es #test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//2
                'user_id' => 2,
                'content' => '#admin os dice a #todos #adios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//3
                'user_id' => 1,
                'content' => 'Pues yo vuelvo a decir #hola y #buenlunes. #yes #positive #bien #jeje #happy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//4
                'user_id' => 2,
                'content' => '#buenlunes. Es cierto que hay que estar #happy pero #llorar también va #bien a veces.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//5
                'user_id' => 1,
                'content' => 'Los que dicen que es martes tienen #razon. Ya es #martes y el cuerpo lo sabe!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//6
                'user_id' => 2,
                'content' => 'Hoy es #martes y #test lo sabeee, quiero todos los detalles!! #buenmartes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
