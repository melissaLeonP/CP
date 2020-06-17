<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensajeRecibido;

class MessageController extends Controller
{
    
    public function store(Request $request){

       $message =  request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',

            
        ]);

        Mail::to('ventas@compupartes.com.mx')->send(new MensajeRecibido($message));


         return redirect("/");


    }
}
