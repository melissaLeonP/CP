<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Producto;


use Illuminate\Support\Facades\Log;
use Request as Peticion;

use File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return  $productos = DB::table('productos')
        ->join('categorias','categorias.idCategoria', '=','productos.idCate')
        ->select('productos.idProducto','productos.nombre','productos.descripcion','productos.status',
        'productos.imagen','categorias.idCategoria','categorias.nombre AS nombreCategoria')
        ->distinct()
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $producto = new Producto();        
        
        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);

        //    Inserción a productos
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $nombreImagen ;
        $producto->idCate = $request->idCate;
        $producto->status = 1;
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        if (!$request->ajax()) return redirect('/administrador');
        
        $idProducto = $request->idProducto;
        $producto = Producto::findOrFail($idProducto);
       
       
        
        $img = Peticion::file('file');
        $extension = $img -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
        File::delete('img/' . $producto->img);
       
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->idCate = $request->idCate;
        $producto->imagen = $nombreImagen;
        $producto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ProductosSelect(Request $request){
        if (!$request->ajax()) return redirect('/administrador');


        return  $productos = DB::table('producto')
        ->join('categorias','categorias.idCategoria', '=','producto.idCate')
        ->select('producto.Nombre','producto.Descripcion','producto.Status',
        'productos.imagen','categorias.idCategorias','categorias.Nombre')
        ->where('producto.Status','=',1)
        ->distinct()
        ->get();
    }

    public function desactivar(Request $request)
    {
        $producto = Producto::findOrFail($request->idProducto);
        $producto->status = 0;
        $producto->save(); 
        
    }
    
    
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');
        $producto = Producto::findOrFail($request->idProducto);
        $producto->status = 1;
        $producto->save();
    }

}
