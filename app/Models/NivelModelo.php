<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelModelo extends Model
{
    use HasFactory;

    public $table = "nivel";

     protected $fillable = [
        'color',
        'tipo',
    ]; 
   

    public $timestamps = false;
  


}
