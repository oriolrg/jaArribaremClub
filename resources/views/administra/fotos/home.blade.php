@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('administra.layouts.sidebar')
            <div class="col py-3"><!--La equita id debe ser app, como hemos visto en app.js-->
                <div class="container">
                    @if(!isset($editdata))
                        <form action="{{ URL::to('home/fotos/nou/') }}" method="POST"  enctype="multipart/form-data">
                    @endif
                    @if(isset($editdata))
                        <form action="{{ URL::to('home/fotos/actualizar') }}/{{$editdata->id}}" method="POST"  enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                    @endif
                        @csrf
                        <h2>Foto @if(isset($editdata)) {{$editdata->nom}} @endif</h3>
                        @include('administra.fotos.form.fotos_form_edita')
                        <button type="submit" class="btn btn-primary" >
                            <i class="glyphicon glyphicon-send"> Enviar </i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    @endsection