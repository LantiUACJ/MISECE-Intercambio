<?php

namespace App\Http\Controllers;

use App\Models\Repositorio;
use App\Http\Requests\StoreRepositorioRequest;
use App\Http\Requests\UpdateRepositorioRequest;

class RepositorioController extends Controller
{
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
     * @param  \App\Http\Requests\StoreRepositorioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepositorioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repositorio  $repositorio
     * @return \Illuminate\Http\Response
     */
    public function show(Repositorio $repositorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repositorio  $repositorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Repositorio $repositorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepositorioRequest  $request
     * @param  \App\Models\Repositorio  $repositorio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepositorioRequest $request, Repositorio $repositorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repositorio  $repositorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repositorio $repositorio)
    {
        //
    }
}
