<?php

namespace App\Http\Controllers;

use App\Models\MensajesEtiquetas;
use App\Models\Mensaje;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class MensajesEtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $etiqueta = Etiqueta::find($id);
        $mensajes = $etiqueta->mensajes;

        return view('welcome', compact($mensajes));
        /* $mensajes = Mensaje::all();
        $mensajes_etiquetas = [];
        foreach ($mensajes as $mensaje) {
            $mensajes_etiquetas[$mensaje->id] = $mensaje->etiquetas;
        }

        return view('welcome', compact('mensajes_etiquetas')); */
    }

    /**
     * Show the form for creating a new resource.
     */

    

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
}
