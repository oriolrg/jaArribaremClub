<?php

namespace App\Http\Controllers;

use App\Models\Trak;
use Illuminate\Http\Request;

class TrakController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trak  $trak
     * @return \Illuminate\Http\Response
     */
    public function show(Trak $trak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trak  $trak
     * @return \Illuminate\Http\Response
     */
    public function edit(Trak $trak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trak  $trak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trak $trak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trak  $trak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trak $trak)
    {
        //
    }
}
