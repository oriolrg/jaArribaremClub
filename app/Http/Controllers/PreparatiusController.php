<?php

namespace App\Http\Controllers;

use App\Models\Preparatius;
use App\Models\FileUpload;
use App\Http\Controllers\ImatgeController;
use Illuminate\Http\Request;

class PreparatiusController extends Controller
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
        $preparatius = Preparatius::all();
        return $preparatius;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $preparatius = Preparatius::all();
        foreach ($preparatius as $key => $value) {
            $value->img = FileUpload::findOrFail($value->imatges_id)->path;
        }
        return view('administra.preparatius.list')->with("preparatius",$preparatius);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function new()
    {
        return view('administra.preparatius.home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preparatius = new Preparatius();
        $preparatius->nom = $request->nom;
        $request['carpeta'] = "preparatius";
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
            $preparatius->imatges_id = $imatge['id'];
        }
        $preparatius->save();
        return redirect('/home/preparatius');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $preparatius = Preparatius::findOrFail($request->id);
        return $preparatius;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function edit(Preparatius $preparatius, $id)
    {
        $preparatius = Preparatius::findOrFail($id);

        
        if(FileUpload::find($preparatius->imatges_id)){$preparatius->imatge = FileUpload::find($preparatius->imatges_id)->path;};
        return view('administra.preparatius.home')->with("editdata",$preparatius);
        return $preparatius;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Preparatius $preparatius)
    {
        $preparatius = Preparatius::findOrFail($id);

        $preparatius->nom = $request->nom;

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
            $preparatius->imatges_id = $imatge['id'];
        }

        $preparatius->save();

        return redirect('/home/preparatius');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $imatge_id =  Preparatius::findOrFail($request->id)->imatges_id;

        
        $preparatius = Preparatius::destroy($request->id);
        return redirect('/home/preparatius');
    }

}
