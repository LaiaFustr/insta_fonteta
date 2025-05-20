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
        //
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
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return redirect()->back()->with('commentBorr', true);
    }
}
