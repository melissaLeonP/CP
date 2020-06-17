<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $table = 'sliders';
   protected $primaryKey = 'idSlider';

   protected $fillable = 
   [
      'texto','textoBoton','linkBoton','img'
   ];
}
