<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioModelo extends Model
{
    use HasFactory;
    public $table = "usuario";
    protected $fillable = [
        'nombre',
        'primerapellido',
        'segundoapellido',
        'correo',
        'contrasena',
        'telefono',
    ];

    public $timestamps = false;

    public $with = ['comentarios'];

    public function comentarios()
    {
        return $this->hasMany('App\Models\ComentarioModelo', 'FK_IdRuta', 'id');
    }
}
