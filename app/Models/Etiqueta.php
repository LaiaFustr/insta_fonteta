<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    /** @use HasFactory<\Database\Factories\EtiquetaFactory> */
    use HasFactory;
    protected $table = 'etiquetas';
    protected $fillable = ['nombre'];
    public $timestamps = true;



    public function mensajes() {
        return $this->belongsToMany(Mensaje::class,'mensajes_etiquetas', 'etiqueta_id', 'mensaje_id')->withTimestamps();
    }
}
