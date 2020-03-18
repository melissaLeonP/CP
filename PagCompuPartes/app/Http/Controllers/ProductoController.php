<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!$request->ajax()) return redirect('/administrador');

        return  $productos = DB::table('producto')
        ->join('categorias','categorias.idCategoria', '=','producto.idCate')
        ->select('producto.Nombre','producto.Descripcion','producto.Status',
        'productos.imagen','categorias.idCategorias','categorias.Nombre')
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
