<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; 

use File;
use Request as Peticion ;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::limit(5)->orderBy('idSlider','desc')->get();
        return $slider;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $img = Peticion::file('file');
        
        $extension = $img->guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
       
        $slider->img = $nombreImagen;
        $slider->titulo = $request->titulo;
        $slider->texto = $request->texto;
        $slider->save();
        return $slider->save();
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
        $slider = Slider::findOrFail($request->id);

        $img = Peticion::file('file');
        $extension = $img -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $img->move('img', $nombreImagen);
        File::delete('img/' . $slider->img);

        $slider->img = $nombreImagen;
        $slider->texto = $texto;
        $slider->titulo = $titulo;
        $slider->save(); 
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

    // public function desactivar(Request $request){
    //     $slider = slider::findOrFail($request->id);
    //     $slider->status = "0";
    //     $slider->save(); 
    // }

    // public function activar(Request $request){
    //     $slider = slider::findOrFail($request->id);
    //     $slider->status = "0";
    //     $slider->save(); 
    // }
}
