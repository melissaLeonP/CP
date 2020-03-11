<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $primaryKey = 'idCaracteristica';
   protected $fillable = 
   [
    'nombre', 'status'
   ];
}
