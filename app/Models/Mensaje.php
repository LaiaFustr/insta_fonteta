<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    /** @use HasFactory<\Database\Factories\MensajeFactory> */
    use HasFactory;
    
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
