<?php

namespace App\Models;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    /** @use HasFactory<\Database\Factories\MensajeFactory> */
    use HasFactory;
    protected $table = 'mensajes';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','content'];
    public $timestamps = true;


    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class,'mensajes_etiquetas', 'mensaje_id','etiqueta_id')->withTimestamps();
    }
}
