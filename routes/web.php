<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOTools;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false]);


Route::get('/caminades/buscar', 'App\Http\Controllers\CaminadaController@show');
Route::get('/caminada/{numeroCaminada}', function ($identificacioCaminada) {
    SEOTools::setTitle($identificacioCaminada);
    SEOTools::setDescription('Informació de la ' . $identificacioCaminada . ' popular de la Vall de Lord. JaArribaremClub');
    return view('caminada')->with('identificacioCaminada',$identificacioCaminada);
});
Route::group(['prefix'=>'home','as'=>'home.'], function(){

    Route::group(['prefix'=>'preparatius','as'=>'preparatius.'], function(){

        Route::get('/', 'App\Http\Controllers\PreparatiusController@list')->name('preparatiusLlista');

        Route::post('/nou', 'App\Http\Controllers\PreparatiusController@store')->name('preparatiusNou');

        Route::get('/nou', 'App\Http\Controllers\PreparatiusController@new')->name('preparatiusNou');

        Route::get('/editar/{id}', 'App\Http\Controllers\PreparatiusController@edit')->name('preparatiusEditar');

        Route::put('/actualizar/{id}', 'App\Http\Controllers\PreparatiusController@update')->name('preparatiusActualitzar');

        Route::delete('/borrar/{id}', 'App\Http\Controllers\PreparatiusController@destroy')->name('preparatiusBorrar');

    });
    Route::group(['prefix'=>'colaboradors','as'=>'colaboradors.'], function(){

        Route::get('/', 'App\Http\Controllers\ColaboradorController@list')->name('colaboradorsLlista');

        Route::post('/nou', 'App\Http\Controllers\ColaboradorController@store')->name('colaboradorsNou');

        Route::get('/nou', 'App\Http\Controllers\ColaboradorController@new')->name('colaboradorsNou');

        Route::get('/editar/{id}', 'App\Http\Controllers\ColaboradorController@edit')->name('colaboradorsEditar');

        Route::put('/actualizar/{id}', 'App\Http\Controllers\ColaboradorController@update')->name('colaboradorsActualitzar');

        Route::delete('/borrar/{id}', 'App\Http\Controllers\ColaboradorController@destroy')->name('colaboradorsBorrar');

    });
    Route::group(['prefix'=>'fotos','as'=>'fotos.'], function(){

        Route::get('/', 'App\Http\Controllers\FotosController@list')->name('fotosLlista');

        Route::post('/nou', 'App\Http\Controllers\FotosController@store')->name('fotosNou');

        Route::get('/nou', 'App\Http\Controllers\FotosController@new')->name('fotosNou');

        Route::get('/editar/{id}', 'App\Http\Controllers\FotosController@edit')->name('fotosEditar');

        Route::put('/actualizar/{id}', 'App\Http\Controllers\FotosController@update')->name('fotosActualitzar');

        Route::delete('/borrar/{id}', 'App\Http\Controllers\FotosController@destroy')->name('fotosBorrar');

    });
    Route::group(['prefix'=>'caminades','as'=>'caminades.'], function(){

        Route::get('/', 'App\Http\Controllers\CaminadaController@index');

        Route::post('/nou', 'App\Http\Controllers\CaminadaController@store')->name('caminadaNou');

        Route::get('/nou', 'App\Http\Controllers\CaminadaController@new');

        Route::get('/editar/{id}', 'App\Http\Controllers\CaminadaController@edit')->name('caminadesEditar');

        Route::get('/editar/fitxer/borrar/{id}/{caminada_id}', 'App\Http\Controllers\CaminadaController@borrarFitxer')->name('caminadesBorrarFitxer');

        Route::put('/actualizar/{id}', 'App\Http\Controllers\CaminadaController@update')->name('caminadesActualitzar');

        Route::delete('/borrar/{id}', 'App\Http\Controllers\CaminadaController@destroy')->name('caminadesBorrar');


    });

    Route::get('/', [App\Http\Controllers\CaminadaController::class, 'index'])->name('home');

});