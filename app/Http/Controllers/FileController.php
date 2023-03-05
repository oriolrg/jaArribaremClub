<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store($request){
        if ($image = $request->file('imatge')) {

            $destinationPath = 'images/'.$request->carpeta.'/';

            $profileImage = $request->nom.'.'. $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $path = Storage::putFile('avatars', $request->file('imatge'));

            $input['image'] = "$destinationPath$profileImage";

            $imatge = new FileUpload();

            $imatge->path = $input['image'];

            $imatge->save();
            
            return $imatge;

        }else{
            return False;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $imatge
     * @return \Illuminate\Http\Response
     */
    public function show(FileUpload $imatge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $imatge
     * @return \Illuminate\Http\Response
     */
    public function edit(FileUpload $imatge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $imatge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileUpload $imatge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $imatge
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileUpload $imatge)
    {
        //
        $imatge = FileUpload::findOrFail($imatge->id);
        //TODO Bug a l'hora de borrar fitxer, el public path apunta a un altre directori
        if(file_exists(storage_path($imatge->path))){
            File::delete(public_path($imatge->path));
            }else{
            dd('File does not exists.');
            }
        return FileUpload::destroy($imatge->id);
    }

}
