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
    public function productosSub(Request $request){
        $id = $request->id;
        return  $productos = DB::table('producto')
        ->join('caracteristica_categoria','producto_talla.idProduc','=','producto.idProducto')
        ->join('tallas','tallas.idTalla', '=','producto_talla.idTalla')
        ->join('imagenes','imagenes.idImagen', '=','producto.idImg')
        ->join('sub_categorias','sub_categorias.idSubCategorias', '=','producto.idSubCat')
        ->select('producto.NombreProducto','producto.Descripcion','producto.Status',
        'producto.Precio','producto.idProducto','producto.Existencia','imagenes.idImagen','imagenes.Imagen','sub_categorias.idSubCategorias',
        'sub_categorias.NombreSub')
        ->where([
            ['producto.idSubcat','=',$id],
            ['producto.Status','=',1]   
        ])
        ->distinct()
        ->get();

    }

    public function show(Request $request)
    {
        //  return view('productos');

        $id = $request->id;

        return  $productos = DB::table('productos')
        ->join('categorias','categorias.idCategoria','=', 'productos.idCate')
        ->join('caracteristica_categoria','caracteristica_categoria.idCate','=','categorias.idCategoria')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('productos.idProducto','productos.nombre','productos.descripcion','productos.status',
        'productos.imagen','categorias.idCategoria','categorias.nombre AS nombreCategoria', DB::raw('group_concat(caracteristicas.nombre) as nombreCaracteristica'))
        ->groupBy('categorias.idCategoria','categorias.nombre','productos.idProducto','productos.nombre','productos.descripcion','productos.status',
        'productos.imagen')
        ->where('productos.status','=','1')
        ->where('productos.idCate','=',$id)
        ->distinct()
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

    public function computadoras(Request $request){

        return  $computadoras = DB::table('productos')
        ->join('caracteristica_categoria','caracteristica_categoria.idcate', '=','productos.idCate')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')        
        ->join('categorias','categorias.idCategoria', '=','productos.idCate')
        ->select('productos.idProducto','productos.nombre','productos.descripcion','productos.status',
        'productos.imagen','categorias.idCategoria','caracteristicas.nombre AS caracteristicas')
        ->get();

        return $computadoras = Producto::all()->where('idCate','=','3')->where('status','=','1');

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
