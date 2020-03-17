<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'idProducto';
    protected $fillable = 
    [
     'idCate', 'nombre','descripcion','imagen','status'
    ];

    public function Categorias()
    {
        return $this->belongsTo('App\Categoria', 'idCate', 'idCategoria');
    }
}
