<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class FotosController extends Controller
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
        $colaborador = Fotos::all();
        return $colaborador;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $colaborador = Fotos::all();
        foreach ($colaborador as $key => $value) {
            $value->img = FileUpload::findOrFail($value->imatges_id)->path;
        }
        return view('administra.fotos.list')->with("colaboradors",$colaborador);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('administra.fotos.home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colaborador = new Fotos();
        $colaborador->nom = $request->nom;
        $colaborador->descripcio = $request->descripcio;
        $request['carpeta'] = "fotos_header";
        if($request->file('imatge')){
            $request['carpeta'] = "fotos_header";
            $image = $request->file('imatge');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $colaborador->imatges_id = $imatge['id'];
        }
        $colaborador->imatges_id = $imatge['id'];
        $colaborador->save();
        return redirect('/home/fotos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $caminada = Fotos::findOrFail($request->id);
        return $caminada;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotos $colaboradors, $id)
    {
        $colaboradors = Fotos::findOrFail($id);
        return view('administra.fotos.home')->with("editdata",$colaboradors);
        return $colaboradors;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Fotos $colaborador)
    {
        $colaborador = Fotos::findOrFail($id);

        $colaborador->nom = $request->nom;
        $colaborador->descripcio = $request->descripcio;

        $colaborador->save();

        return redirect('/home/fotos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $colaborador = Fotos::destroy($id);
        return redirect('/home/fotos');
    }

}
