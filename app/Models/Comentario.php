<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;
    protected $table = 'comentarios';
    protected $fillable = ['content'];
    public $timestamps = true;

    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class, 'mensaje_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
