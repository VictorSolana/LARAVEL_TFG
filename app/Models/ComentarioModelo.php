<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioModelo extends Model
{
    use HasFactory;
    public $table = "comentarios";

    public $timestamps = false;
   
}
