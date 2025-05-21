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
            [//1
                'nombre'=> '#todos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//2
                'nombre'=> '#test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//3
                'nombre'=> '#admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//4
                'nombre'=> '#adios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//5
                'nombre'=> '#hola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//6
                'nombre'=> '#buenlunes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//7
                'nombre'=> '#yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//8
                'nombre'=> '#positive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//9
                'nombre'=> '#bien',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//10
                'nombre'=> '#jeje',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//11
                'nombre'=> '#happy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//12
                'nombre'=> '#llorar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//13
                'nombre'=> '#razon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//14
                'nombre'=> '#martes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [//14
                'nombre'=> '#buenmartes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ]);
    }
}
