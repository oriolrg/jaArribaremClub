<?php

namespace App\Http\Controllers;

use App\Models\Controls;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $caminada = Controls::all();
        return $caminada;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'nom', 'descripcio', 'data_caminada','participants','caminada_numero','poblacio', 'direccio_inici', 'coordenades_inici', 'track_id', 'imatges_id','mapa_id', 'altimetria_id', 'triptic_id'];
        //return $request;
        $caminada = new Controls();
        $caminada->nom = $request->nom;
        $caminada->descripcio = $request->descripcio;
        $caminada->distancia_acomulada = $request->distancia_acomulada;

        $caminada->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $caminada = Controls::findOrFail($request->id);
        return $caminada;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function edit(Controls $caminada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Controls $caminada)
    {
        $caminada = Controls::findOrFail($request->id);

        $caminada->name = $request->name;
        $caminada->description = $request->description;
        $caminada->distancia_acomulada = $request->distancia_acomulada;

        $caminada->save();

        return $caminada;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $caminada = Controls::destroy($request->id);
        return $caminada;
    }
}
