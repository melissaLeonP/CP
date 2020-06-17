<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   protected $primaryKey = 'idCategoria';
   protected $fillable = 
   [
    'imagen','nombre', 'status'
   ];
}
