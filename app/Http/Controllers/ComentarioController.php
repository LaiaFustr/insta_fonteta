<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        /*  dd($request); */
        $data = request()->validate([
            'user_id' => 'required|exists:users,id',
            'mensaje_id' => 'required|exists:mensajes,id',
            'content' => '',
        ]);
        /* dd($data); */
        Comentario::create([
            'user_id' => $data['user_id'],
            'mensaje_id' => $data['mensaje_id'],
            'content' => $data['content']
        ]);
        return back()->with('commentCreated', true);
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
        $savecomment = Comentario::findOrFail($validated['id']);
        $savecomment->content = $validated['content'];
        $savecomment->updated_at = now();
        $savecomment->save();

        return back()->with('commentEdited', true);
    }
    /* 
     public function edit(Comentario $comentario)
    {
        //
    } */
    public function edit($id)
    {
        $editcomment = Comentario::find($id);

        return redirect()->route('home')->with('editcomment', $editcomment->id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return redirect()->route('home')->with('commentDel', true);
    }
}
