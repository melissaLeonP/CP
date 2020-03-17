<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $primaryKey = 'idSlider';
   protected $fillable = 
   [
    'nombre', 'titulo','texto','img'
   ];
}
