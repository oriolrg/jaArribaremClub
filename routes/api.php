<?php

use App\Models\Caminada;
use App\Models\Colaborador;
use App\Models\Controls;
use App\Models\FileUpload;
use App\Models\Preparatius;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('colaboradors', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    $colaboradors = Colaborador::get();
    foreach ($colaboradors as $key => $value) {
        $value->img = FileUpload::findOrFail($value->imatges_id)->path;
    }
    return $colaboradors;
});
Route::get('caminades', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    $caminades = Caminada::orderBy('caminada_numero','asc')->get();
    foreach ($caminades as $key => $caminada) {
        $caminada->controls = Controls::where('caminada_id',$caminada->id)->get();
        if($caminada->track_id){$caminada->track_id = FileUpload::findOrFail($caminada->track_id)->path;}
        if($caminada->mapa_id){$caminada->mapa_id = FileUpload::findOrFail($caminada->mapa_id)->path;}
        if($caminada->altimetria_id){$caminada->altimetria_id = FileUpload::findOrFail($caminada->altimetria_id)->path;}
        if($caminada->imatges_id){$caminada->imatges_id = FileUpload::findOrFail($caminada->imatges_id)->path;}
        if($caminada->triptic_id){$caminada->triptic_id = FileUpload::findOrFail($caminada->triptic_id)->path;}
    }
    
    return $caminades;
});

Route::get('preparatius', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    $caminades = Preparatius::all();
    foreach ($caminades as $key => $caminada) {
        if($caminada->imatges_id){$caminada->imatges_id = FileUpload::findOrFail($caminada->imatges_id)->path;}
    }
    
    return $caminades;
});

Route::get('caminada/{id}', function($id) {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    if($id != 'actual'){
        $caminada = Caminada::where('nom',$id)->first();
        $caminada->controls = Controls::where('caminada_id',$caminada->id)->get();
        if($caminada->track_id){$caminada->track_id = FileUpload::findOrFail($caminada->track_id)->path;}
        if($caminada->mapa_id){$caminada->mapa_id = FileUpload::findOrFail($caminada->mapa_id)->path;}
        if($caminada->altimetria_id){$caminada->altimetria_id = FileUpload::findOrFail($caminada->altimetria_id)->path;}
        if($caminada->imatges_id){$caminada->imatges_id = FileUpload::findOrFail($caminada->imatges_id)->path;}
        if($caminada->triptic_id){$caminada->triptic_id = FileUpload::findOrFail($caminada->triptic_id)->path;}
    }else{
        $caminada = Caminada::orderBy('caminada_numero','desc')->first();

        $caminada->controls = Controls::where('caminada_id',$caminada->id)->get();
        if($caminada->track_id){$caminada->track_id = FileUpload::findOrFail($caminada->track_id)->path;}
        if($caminada->mapa_id){$caminada->mapa_id = FileUpload::findOrFail($caminada->mapa_id)->path;}
        if($caminada->altimetria_id){$caminada->altimetria_id = FileUpload::findOrFail($caminada->altimetria_id)->path;}
        if($caminada->imatges_id){$caminada->imatges_id = FileUpload::findOrFail($caminada->imatges_id)->path;}
        if($caminada->triptic_id){$caminada->triptic_id = FileUpload::findOrFail($caminada->triptic_id)->path;}
    }
    return $caminada;
});

Route::get('caminades/municipi/{municipi}', function($municipi) {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    $caminades = Caminada::where('poblacio', $municipi)->get();
    foreach ($caminades as $key => $caminada) {
        $caminada->controls = Controls::where('caminada_id',$caminada->id)->get();
        if($caminada->track_id){$caminada->track_id = FileUpload::findOrFail($caminada->track_id)->path;}
        if($caminada->mapa_id){$caminada->mapa_id = FileUpload::findOrFail($caminada->mapa_id)->path;}
        if($caminada->altimetria_id){$caminada->altimetria_id = FileUpload::findOrFail($caminada->altimetria_id)->path;}
        if($caminada->imatges_id){$caminada->imatges_id = FileUpload::findOrFail($caminada->imatges_id)->path;}
        if($caminada->triptic_id){$caminada->triptic_id = FileUpload::findOrFail($caminada->triptic_id)->path;}
    }
    
    return $caminades;
});
