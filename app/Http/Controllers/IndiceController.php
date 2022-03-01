<?php

namespace App\Http\Controllers;

use App\Models\Indice;
use Illuminate\Http\Request;

class IndiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("indice.index",["model"=>Indice::all()]);
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
     * @param  \App\Models\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function show(Indice $indice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function edit(Indice $indice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indice $indice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indice  $indice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indice $indice)
    {
        $indice->delete();
        return redirect("/indice/index/");
    }
}
