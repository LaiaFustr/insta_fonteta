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
        $mensajes->listaetiquetas = Etiqueta::all();
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
                if (!$lastmsg->etiquetas()->pluck('id')->contains($lasteti->id)) {
                    $lastmsg->etiquetas()->attach($lasteti->id);
                }
            }
        }
        return back()->with('msgCreated', true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'content' => 'required'
        ]);

        /* Mensaje::whereId($valiated->id)->update() */
        $savemsg = Mensaje::findOrFail($validated['id']);
        $savemsg->content = $validated['content'];

        $etiquetas = $savemsg->etiquetas()->get();
        foreach ($etiquetas as $etiqueta) {
            $esta = false;
            $msg = Etiqueta::find($etiqueta->id)->mensajes()->get();
            if ($msg->count() > 1) {
                $esta = true;
            }

            if (!$esta) {
                Etiqueta::find($etiqueta->id)->delete();
            }
        }

        $savemsg->etiquetas()->detach();

        $strEtiquetas =  $savemsg['content'];
        if (str_contains($strEtiquetas, '#')) {
            preg_match_all('/#(\w+)/', $strEtiquetas, $etiquetas);
            foreach ($etiquetas[0] as $etiqueta) {
                $lasteti = Etiqueta::firstOrCreate([
                    'nombre' => $etiqueta,
                ]);

                if (!$savemsg->etiquetas()->where('id', $lasteti->id)->count() > 0) {
                    $savemsg->etiquetas()->attach($lasteti->id);
                }
            }
        }
        $savemsg->updated_at = now();
        $savemsg->save();

        return back()->with('msgEdited', true);
    }

    public function edit($id)
    {
        $editmsg = Mensaje::find($id);

        return redirect()->route('home')->with('editmsg', $editmsg->id)->with('content', $editmsg->content);
    }
    public function update(Request $request)
    {
        return '';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $etiquetas = $mensaje->etiquetas()->get();

        foreach ($etiquetas as $etiqueta) {
            $esta = false;
            $msg = Etiqueta::find($etiqueta->id)->mensajes()->get();
            if ($msg->count() > 1) {
                $esta = true;
            }

            if (!$esta) {
                Etiqueta::find($etiqueta->id)->delete();
            }
        }

        $mensaje->etiquetas()->detach();
        $mensaje->comentarios()->delete();
        $mensaje->delete();
        return redirect()->back()->with('msgDel', true);
    }
}
