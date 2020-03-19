<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica_categoria extends Model
{
    protected $primaryKey = 'idCaraCate';
    protected $table = 'caracteristica_categoria';

   protected $fillable = 
   [
    'idCate', 'idCarac'
   ];

   public function categoria()
   {
       return $this->belongsToMany('App\Categoria');
   }
   public function caracteristica(){
       return $this->belongsToMany('App\Caracteristica');
   }
}
