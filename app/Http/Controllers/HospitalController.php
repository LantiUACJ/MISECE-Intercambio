<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("hospital.index",["hospitales"=>Hospital::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("hospital.registro", ["model"=>new Hospital]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            "user"=>"required|unique:hospitals,user",
            "password"=>"required",
            "url"=>"required|url",
            "nombre"=>"required",
            "telefono"=>"required|integer|digits_between:8,11",
            "email"=>"required|email",
            "calle"=>"required",
            "numero"=>"required|integer|digits_between:1,5",
            "colonia"=>"required",
            "codigo_postal"=>"required|integer|digits:5",
            "ciudad"=>"required",
            "estado"=>"required",
            "version"=>"required|exists:versions,version",
        ]);

        $input["password"] = Hash::make($input["password"]);
        $model = Hospital::create($input);

        return redirect("/hospital");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view("hospital.ver",["model"=>$hospital]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        return view("hospital.editar",["model"=>$hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $input = $request->validate([
            "user"=>"required|unique:hospitals,user,".$hospital->id,
            "url"=>"required|url",
            "nombre"=>"required",
            "telefono"=>"required|integer|digits_between:8,10",
            "email"=>"required|email",
            "calle"=>"required",
            "numero"=>"required|integer|digits_between:1,5",
            "colonia"=>"required",
            "codigo_postal"=>"required|integer|digits:5",
            "ciudad"=>"required",
            "estado"=>"required",
            "version"=>"required|exists:versions,version",
        ]);
        if(isset( $request->input()["password"] ))
            $input["password"] = Hash::make($request->input()["password"]);

        $hospital->update($input);
        return redirect("/hospital");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect("/hospital");
    }
}
