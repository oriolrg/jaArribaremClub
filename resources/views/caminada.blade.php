@extends('layouts.app')

    @section('content')
        <div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
            <main id="main">            
                <caminada-component identificacio-caminada="{{$identificacioCaminada}}"></caminada-component>
                <com-arribar-component  identificacio-caminada="{{$identificacioCaminada}}"></com-arribar-component>
                <caminades-anteriors-component></caminades-anteriors-component>
                <colaboradors-component></colaboradors-component>
            </main>
            <footer-component></footer-component>
        </div>
    @endsection