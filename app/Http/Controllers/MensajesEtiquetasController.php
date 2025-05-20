<?php

namespace App\Http\Controllers;

use App\Models\MensajesEtiquetas;
use App\Models\Mensaje;
use App\Models\Etiqueta;
use App\Models\User;
use Illuminate\Http\Request;

class MensajesEtiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $mensajes = Etiqueta::find($id)->mensajes()->get();
        return view('welcome', compact('mensajes'));
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
    public function create(Request $request)
    {


        $data = request()->validate([
            'user_id' => 'required|exists:users,id',
            'content' => '',
        ]);
        /* dd($data); */
        Mensaje::create([
            'user_id' => $data['user_id'],
            'content' => $data['content']
        ]);
         $lastmsg = Mensaje::latest()->first();
        $strEtiquetas =  $data['content'];
        if (str_contains($strEtiquetas, '#')) {
            /* $etiquetas = [];
            $substr = $strEtiquetas;

            $pos = strpos($substr, '#');
            $substr = substr($substr, $pos);
            dd($substr); */
            preg_match_all('/#(\w+)/', $strEtiquetas, $etiquetas);
            foreach ($etiquetas[0] as $etiqueta) {
                $lasteti = Etiqueta::firstOrCreate([
                    'nombre' => $etiqueta,
                ]);
                $lastmsg->etiquetas()->attach($lasteti->id);
            }

        }
        return back()->with('msgCreated', true);
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
