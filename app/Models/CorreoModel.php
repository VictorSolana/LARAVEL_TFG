<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\Correo;

class CorreoModel extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','correo','mensaje'];
    protected $table = "correo";
    public $timestamps = false;

    public static function boot(){
        parent::boot();
        static::created(function($envio){
         

            $correo = "explorasenderosmadrid@gmail.com";

            Mail::to($correo)->send(new Correo($envio));

        });
    }
}
