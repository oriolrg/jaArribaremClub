<?php

namespace App\Http\Controllers;

use App\Models\Caminada;
use App\Models\Controls;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class CaminadaController extends Controller
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
        $caminada = Caminada::orderBy('caminada_numero', 'desc')->get();
        //return $caminada;
        /*foreach ($colaborador as $key => $value) {
            $value->img = File::findOrFail($value->imatges_id)->path;
        }*/
        return view('administra.caminades.list')->with("caminades",$caminada);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('administra.caminades.home');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function edit(Caminada $colaboradors, $id)
    {
        $caminada = Caminada::findOrFail($id);
        //return $caminada;
        $caminada->controls = Controls::where("caminada_id", $caminada->id)->get();
        //$caminada->imatge = FileUpload::find($caminada->imatges_id)->path;
        if(FileUpload::find($caminada->imatges_id)){$caminada->imatge = FileUpload::find($caminada->imatges_id)->path;};
        if(FileUpload::find($caminada->track_id)){$caminada->track = FileUpload::find($caminada->track_id)->path;};
        if(FileUpload::find($caminada->mapa_id)){$caminada->mapa = FileUpload::find($caminada->mapa_id)->path;};
        if(FileUpload::find($caminada->altimetria_id)){$caminada->altimetria = FileUpload::find($caminada->altimetria_id)->path;};
        if(FileUpload::find($caminada->triptic_id)){$caminada->triptic = FileUpload::find($caminada->triptic_id)->path;};
        //return $caminada;
        return view('administra.caminades.home')->with("editdata",$caminada);
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
        $caminada = new Caminada();
        $caminada->nom = $request->nom;
        $caminada->descripcio = $request->descripcio;
        $caminada->data_caminada = $request->data;
        $caminada->participants = $request->participants;
        $caminada->caminada_numero = $request->caminada_numero;
        $caminada->poblacio = $request->poblacio;
        $caminada->direccio_inici = $request->direccio_inici;
        $caminada->latitud = $request->latitud;
        $caminada->longitud = $request->longitud;

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
            $caminada->imatges_id = $imatge['id'];
        }
        if($request->file('altimetria')){
            $request['carpeta'] = "altimetria";
            $image = $request->file('altimetria');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->altimetria_id = $imatge['id'];
        }
        if($request->file('triptic')){
            $request['carpeta'] = "triptics";
            $image = $request->file('triptic');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->triptic_id = $imatge['id'];
        }
        if($request->file('mapa')){
            $request['carpeta'] = "mapes";
            $image = $request->file('mapa');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->mapa_id = $imatge['id'];
            //$caminada->imatges_id = $imatgePortada;
        }
        if($request->file('track')){
            $request['carpeta'] = "tracks";
            $image = $request->file('track');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->track_id = $imatge['id'];
            //$caminada->imatges_id = $imatgePortada;
        }
        $caminada->save();
        //$control = new Controls() ;
        //$control->nom = $request->nom_sortida;
        //$control->descripcio = $request->descripcio_sortida;  
        //$control->coordenades = $request->coordenades_inici;  
        //$caminada->controls()->save($control);
        if($request->control){
            foreach ($request->control as $key => $value) {
                $control = new Controls();
                $control->nom = $value['nom'];
                $control->descripcio = $value['descripcio'];  
                $control->distancia = $value['distancia']; 
                $control->latitud = $value['latitud'];  
                $control->longitud = $value['longitud'];  
                $control->num_control = $key; 
                $control->caminada_id = $caminada->id; 
                $control->save();
            }
        }
        

        //$control = new Controls() ;
        //$control->nom = $request->nom_arribada;
        //$control->descripcio = $request->descripcio_arribada;  
        //$control->distancia = $request->distancia_acumulada_arribada; 
        //$control->latitud = $request->latitud;  
        //$control->longitud = $request->longitud;  
        //$caminada->controls()->save($control);

        $caminada->save();
        return redirect('/home/caminades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $caminada = Caminada::findOrFail($request->id);
        return $caminada;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Caminada $caminada)
    {
        $caminada =  Caminada::findOrFail($id);
        $caminada->nom = $request->nom;
        $caminada->descripcio = $request->descripcio;
        $caminada->data_caminada = $request->data;
        $caminada->participants = $request->participants;
        $caminada->caminada_numero = $request->caminada_numero;
        $caminada->poblacio = $request->poblacio;
        $caminada->direccio_inici = $request->direccio_inici;
        $caminada->latitud = $request->latitud;
        $caminada->longitud = $request->longitud;

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
            $caminada->imatges_id = $imatge['id'];
        }
        if($request->file('altimetria')){
            $request['carpeta'] = "altimetria";
            $image = $request->file('altimetria');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->altimetria_id = $imatge['id'];
        }
        if($request->file('triptic')){
            $request['carpeta'] = "triptics";
            $image = $request->file('triptic');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->triptic_id = $imatge['id'];
        }
        if($request->file('mapa')){
            $request['carpeta'] = "mapes";
            $image = $request->file('mapa');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->mapa_id = $imatge['id'];
            //$caminada->imatges_id = $imatgePortada;
        }
        if($request->file('track')){
            $request['carpeta'] = "tracks";
            $image = $request->file('track');
            $destinationPath = 'images/'.$request->carpeta.'/';
            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$destinationPath$profileImage";
            $imatge = new FileUpload();
            $imatge->path = $input['image'];
            $imatge->save();
            $caminada->track_id = $imatge['id'];
            //$caminada->imatges_id = $imatgePortada;
        }
        $caminada->save();
        //return $request->control;
        //$control = new Controls() ; 
        if($request->control){
            foreach ($request->control as $key => $value) {
                    $control = Controls::where("caminada_id", $caminada->id)->where('num_control',$key)->first();
                    $control->nom = $value['nom'];
                    $control->descripcio = $value['descripcio'];  
                    $control->distancia = $value['distancia']; 
                    $control->latitud = $value['latitud'];  
                    $control->longitud = $value['longitud'];  
                    $control->save();
            }
        }
        

        //$control = new Controls() ;
        //$caminada->save();


        return redirect('/home/caminades');
    }
    public function borrarFitxer( $id, $fitxer_tipus){ 
        $caminada = Caminada::where('id',$id)->first();
        $aBorrar = $caminada[$fitxer_tipus];
        $caminada[$fitxer_tipus] = null;
        $caminada->save();
        $file = FileUpload::findOrFail($aBorrar);
        //return (new FileController)->destroy($file );
        return redirect('/home/caminades/editar/'.$id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caminada  $caminada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $caminada = Caminada::findOrFail($request->id);
        $caminada->controls()->detach();
        $caminada->delete();
        
        //$controls = Controls::where('caminada_id',$request->id)->delete();
        return redirect('/home/caminades');
    }
}
