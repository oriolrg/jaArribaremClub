@extends('layouts.app')

    @section('content')
        <div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
            <header-component></header-component><!--Añadimos nuestro componente vuejs-->
            <main id="main">
                <caminada-component></caminada-component>
                <com-arribar-component></com-arribar-component>
                <caminades-anteriors-component></caminades-anteriors-component>
                <colaboradors-component></colaboradors-component>
            </main>
            <footer-component></footer-component>
        </div>
    @endsection