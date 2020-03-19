<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Caracteristica_categoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return $categorias;
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');
       
        $categoria = new Categoria();        
        
        // $img = Peticion::file('file');
        // $extension = $img -> guessExtension();
        // $date = date('d-m-Y_h-i-s-ms-a');
        // $prefijo = 'Image';
        // $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        // $img->move('img', $nombreImagen);
        // $imagenes->Imagen = $nombreImagen;        
        // $imagenes->Tipo = 'P';
        // $imagenes->save();
        // $idImg = $imagenes->idImagen;



        
        //    Inserción a productos
        $categoria->nombre = $request->nombre;
        
        // $producto->idColor = $request->idColor;
        // $producto->idTalla = $request->idTalla;
        // $producto->idImg = $idImg ;
        $categoria->Status = '1';
        $categoria->save();
        $idCate = $categoria->idCategoria;
        $data = explode(",", $request->idCarac);

        foreach ($data as $idCarac){
            $caracteristica = new Caracteristica_categoria();
            $caracteristica->idCate = $idCate;
            $caracteristica->idCarac = $idCarac;
            $caracteristica->save();
        }
        
    }

    public function registrar(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        $categoria = Categoria::findOrFail($request->idCategoria);
        $categoria->status = 0;
        $categoria->save(); 
        
    }
    
    
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');
        $categoria = Categoria::findOrFail($request->idCategoria);
        $categoria->status = 1;
        $categoria->save();
    }
   
}
