<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\FileUpload;
use App\Http\Controllers\ImatgeController;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
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
        $colaborador = Colaborador::all();
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
        $colaborador = Colaborador::all();
        foreach ($colaborador as $key => $value) {
            $value->img = FileUpload::findOrFail($value->imatges_id)->path;
        }
        return view('administra.colaboradors.list')->with("colaboradors",$colaborador);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('administra.colaboradors.home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colaborador = new Colaborador();
        $colaborador->nom = $request->nom;
        $colaborador->descripcio = $request->descripcio;
        $colaborador->url = $request->url;
        $request['carpeta'] = "colaboradors";
        if($request->file('imatge')){
            $request['carpeta'] = "portada_caminada";
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
        $colaborador->save();
        return redirect('/home/colaboradors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $caminada = Colaborador::findOrFail($request->id);
        return $caminada;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function edit(Colaborador $colaboradors, $id)
    {
        $colaboradors = Colaborador::findOrFail($id);
        return view('administra.colaboradors.home')->with("editdata",$colaboradors);
        return $colaboradors;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Colaborador $colaborador)
    {
        $colaborador = Colaborador::findOrFail($id);

        $colaborador->nom = $request->nom;
        $colaborador->descripcio = $request->descripcio;
        $colaborador->url = $request->url;

        $colaborador->save();

        return redirect('/home/colaboradors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $imatge_id =  Colaborador::findOrFail($request->id)->imatges_id;

        
        $colaborador = Colaborador::destroy($request->id);
        return redirect('/home/colaboradors');
    }

}
