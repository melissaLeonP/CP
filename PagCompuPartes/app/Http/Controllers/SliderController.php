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
        $slider = Slider::all();
        return $slider;
    }
    public function mostrar()
    {
        // $slider = Slider::all()->orderBy('idSlider', 'desc')->take(3);
        // return $slider;

        $slider = Slider::limit(3)->orderBy('idSlider', 'asc')->get();
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
        // $slider->titulo = $request->titulo;
        if($request->radio == 'si'){
        $slider->textoBoton = $request->textoBoton;
        $slider->linkBoton = $request->linkBoton;
        }else{
        $slider->textoBoton = "";
        $slider->linkBoton = "";
        }
         
        $slider->texto = $request->texto;
        $slider->save();
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
        $slider = Slider::findOrFail($request->idSlider);

        $imagen = Peticion::file('file');
        $extension = $imagen -> guessExtension();
        $date = date('d-m-Y_h-i-s-ms-a');
        $prefijo = 'Image';
        $nombreImagen = $prefijo.'_'.$date.'.'.$extension;
        $imagen->move('img', $nombreImagen);
        File::delete('img/' . $slider->Imagen);

        $slider->img = $nombreImagen;
        if($request->radio == 'si'){
            $slider->textoBoton = $request->textoBoton;
            $slider->linkBoton = $request->linkBoton;
            }else{
            $slider->textoBoton = "";
            $slider->linkBoton = "";
            }
        // $slider->textoBoton = $request->textoBoton;
        // $slider->linkBoton = $request->linkBoton;

        $slider->texto = $request->texto;

        $slider->save(); 
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
