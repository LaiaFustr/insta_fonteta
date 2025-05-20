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
        /* $mensajes = Etiqueta::find($id)->mensajes()->get(); */


        $mensajes = /*  Mensaje:: */ Etiqueta::find($id)->mensajes()->with('comentarios', 'comentarios.user', 'user', 'etiquetas')->orderBy('id', 'desc')->get();

        foreach ($mensajes as $mensaje) {
            $str = $mensaje->content;
            foreach ($mensaje->etiquetas as $etiqueta) {
                $hashtag = '<a class="text-muted p-0 m-0 mb-1" href="' . route('etiqueta.show', $etiqueta->id) . '">' . $etiqueta->nombre . '</a>';
                $mensaje->content = str_replace($etiqueta->nombre, $hashtag, $mensaje->content);
            }
        }

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
    public function store(Request $request) {}

    public function update(Request $request) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->etiquetas()->detach();
        $mensaje->delete();
        return redirect()->back()->with('commentDel', true);
    }
}
