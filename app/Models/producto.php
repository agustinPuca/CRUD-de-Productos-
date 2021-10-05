<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table='productos'; // la tabla con la que voy  a trabajar

    protected $fillable=['codigo','name','descripcion','precio','stock']; //atributos de la tabla

    public $timestamps=false;
}
