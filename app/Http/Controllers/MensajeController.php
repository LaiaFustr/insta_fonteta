<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes =  Mensaje::with('comentarios', 'comentarios.user', 'user', 'etiquetas')->orderBy('id', 'desc')->get();

        foreach ($mensajes as $mensaje) {
            $str = $mensaje->content;
            foreach ($mensaje->etiquetas as $etiqueta) {
                $hashtag = '<a class="text-muted p-0 m-0 mb-1" href="'.route('etiqueta.show',$etiqueta->id).'">'.$etiqueta->nombre.'</a>';
                $mensaje->content = str_replace($etiqueta->nombre,$hashtag, $mensaje->content);
            }
        }
        return view('welcome', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }
}
