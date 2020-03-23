<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Caracteristica_categoria;
use Illuminate\Support\Facades\DB;
class CaracteristicaCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        $id = $request->idCategoria;

        return  $caracteristicas = DB::table('caracteristica_categoria')
        ->join('categorias','categorias.idCategoria', '=','caracteristica_categoria.idCate')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('categorias.idCategoria','caracteristica_categoria.idCarac AS idCaracteristica','caracteristicas.nombre AS nombreCaracteristicas')
        ->where([
            ['categorias.idCategoria','=',$id],
            ['categorias.status','=',1]   
        ])
        ->get();
    }

    public function selectCaracteristicasCategorias(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

       

        return  $caracteristicas = DB::table('caracteristica_categoria')
        ->join('categorias','categorias.idCategoria', '=','caracteristica_categoria.idCate')
        ->join('caracteristicas','caracteristicas.idCaracteristica', '=','caracteristica_categoria.idCarac')
        ->select('categorias.idCategoria','caracteristica_categoria.idCarac','caracteristicas.nombre AS nombreCaracteristicas')
        ->where([
            ['categorias.status','=',1]   
        ])
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
}
