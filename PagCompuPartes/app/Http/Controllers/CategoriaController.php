<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Caracteristica_categoria;
use Illuminate\Support\Facades\DB;
use File;
use Request as Peticion ;


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
 
    public function selectCategorias()
    {
        return  $categorias = DB::table('categorias')
        ->join('caracteristica_categoria','caracteristica_categoria.idCate','=','categorias.idCategoria')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('categorias.idCategoria','categorias.imagen','categorias.nombre','categorias.status', DB::raw('group_concat(caracteristicas.nombre) as nombreCaracteristica'))
        ->groupBy('categorias.idCategoria','categorias.imagen','categorias.nombre','categorias.status')
        ->distinct()
        ->get();
    }


    public function selectCategoriasTienda()
    {
        return  $categorias = DB::table('categorias')
        ->join('caracteristica_categoria','caracteristica_categoria.idCate','=','categorias.idCategoria')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('categorias.idCategoria','categorias.imagen','categorias.nombre','categorias.status', DB::raw('group_concat(caracteristicas.nombre) as nombreCaracteristica'))
        ->groupBy('categorias.idCategoria','categorias.imagen','categorias.nombre','categorias.status')
        ->distinct()
        ->where('categorias.status','=','1')
        ->get();
    }
    public function categoriasProducto(Request $request)
    {
        $idCategoria = $request->idCategoria;
        
        return  $categorias = DB::table('categorias')
        ->join('caracteristica_categoria','caracteristica_categoria.idCate','=','categorias.idCategoria')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('categorias.idCategoria','categorias.imagen','categorias.nombre', DB::raw('group_concat(caracteristicas.nombre) as nombreCaracteristica'))
        ->groupBy('categorias.idCategoria','categorias.nombre')
        ->distinct()
        ->where('status','=','1')
        ->where('categorias.idCategoria','=',$id)
        ->get();
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
        
        $img = Peticion::file('file');
        $extension = $img -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
        $categoria->imagen = $nombreImagen;        
        // $imagenes->save();
   



        
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
        if (!$request->ajax()) return redirect('/consola');
        
        $idCategoria = $request->idCategoria;
        $categoria = Categoria::findOrFail($idCategoria);

        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);
        File::delete('img/' . $categoria->imagen);

        $categoria->imagen = $nombreImagen;
        $categoria->nombre = $request->nombre;
     

        $categoria->save();
        $idCate = $categoria->idCategoria;

        $data = explode(",", $request->idCarac);
        DB::table('caracteristica_categoria')->where('idCate', $idCate)->delete();
        foreach ($data as $idCarac){
                       


            $caracteristicaCategoria = new Caracteristica_categoria();
            $caracteristicaCategoria->idCate = $idCate;
            $caracteristicaCategoria->idCarac = $idCarac;
            $caracteristicaCategoria->save();
        }
       
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
