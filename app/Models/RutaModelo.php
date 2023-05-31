<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaModelo extends Model
{
    use HasFactory;
   public $table = "ruta";
   protected $primaryKey = 'Id';
   protected $fillable = [
    'FK_IdUsuario',
    'FK_IdNivel',	
    'FK_IdTipo',
    'Nombre',
    'Fecha',	
    'Hora',	
    'Descripcion',	
    'Fotografia',	
    'Tiempo',	
    'Kilometros',
    'Url'
];

public $with = ['tipo','nivel','usuarios','comentarios'];
   public $timestamps = false;

   public function tipo(){
    return $this->belongsTo('App\Models\TipoModelo','FK_IdTipo','Id');
}

public function nivel(){
    return $this->belongsTo('App\Models\NivelModelo','FK_IdNivel','Id');
 }

 public function usuarios(){
  return $this->belongsTo('App\Models\UsuarioModelo','FK_IdUsuario','id');
}

public function comentarios()
{
    return $this->hasMany('App\Models\ComentarioModelo', 'FK_IdRuta', 'Id');
}
//! el usuario puede sacar la ruta y las reseñas q haya hecho

// la reseña puede sacar la ruta y el usuario q la hizo
 // nivel tiene muchas rutas 
}