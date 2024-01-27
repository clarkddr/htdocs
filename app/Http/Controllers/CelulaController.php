<?php

namespace App\Http\Controllers;

use App\Models\Celula;
use Illuminate\Http\Request;

class CelulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('celulas.index');
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
        $request->validate([
            'message' => ['required','max:255']
        ]);

        // Esta seria la manera clasica de crear un mensaje, pero en seguida se muestra la manera usando la relacion del usuario con sus mensajes
/*        Celula::create([
            'message' => $request->get('message'),            
            'user_id' => auth()->id(),
        ]);
*/      
        auth()->user()->celulas()->create(['message' => $request->get('message')]);
        session()->flash('status','Mensaje agregado!!');
        return to_route('celulas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Celula $celula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Celula $celula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Celula $celula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Celula $celula)
    {
        //
    }
}
