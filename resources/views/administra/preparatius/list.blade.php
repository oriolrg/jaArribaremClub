@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('administra.layouts.sidebar')
            <div class="col py-3"><!--La equita id debe ser app, como hemos visto en app.js-->
                <div class="container">
                        <h2>Fotos preparatius</h2> 
                        <a href="preparatius/nou" class="btn btn-success col-12" >
                            <b><i class="bi bi-patch-plus"> Nova foto</i></b>
                        </a>
                        <ul class="list-group cProductsList"> 
                            @foreach($preparatius as $key => $data)
                            <li class="list-group-item d-flex">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <p class="p-0 m-0 flex-grow-1">{{ $data->nom }}</p>
                                        </div>
                                        <div class="col-sm">
                                            <img src="/{{ $data->img }}" alt="{{ $data->nom }}" width="80" height="80"/> 
                                        </div>
                                        <div class="col-sm">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <a href="{{ route('home.preparatius.preparatiusEditar', $data->id) }}" class="btn btn-primary col-sm" >
                                                            <i class="bi bi-gear-wide"> Editar </i>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <form action="{{ route('home.preparatius.preparatiusBorrar', $data->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger col-sm" title="Delete"><i class="bi bi-eraser"> Borrar </i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div></div>
                                
                            </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
        
    @endsection