<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoModelo extends Model
{
    use HasFactory;
    protected $table = "tipo";
    protected $fillable = ['Tipo', 'Descripcion'];
    public $timestamps = false;

    
}
