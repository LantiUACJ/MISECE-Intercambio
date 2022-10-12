<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Log;

class BlockchainController extends Controller
{
    public function index(Request $request){
        /* filtros */
        $filtros = $request->validate([
            "consultor"=>"nullable",
            "fecha"=>"nullable",
            "hospital"=>"nullable",
            "paciente"=>"nullable",
            "respuestas"=>"nullable",
        ]);
        $query = Log::orderBy("id", "desc");
        if(isset($filtros["consultor"]))
            $query->where("consultor", "like" ,  "%" . $filtros["consultor"] . "%");
        if(isset($filtros["fecha"]))
            $query->where("fecha", "=",  $filtros["fecha"]);
        if(isset($filtros["hospital"]))
            $query->where("hospital", "like" ,  "%" . $filtros["hospital"] . "%");
        if(isset($filtros["paciente"]))
            $query->where("paciente", "like" ,  "%" . $filtros["paciente"] . "%");
        if(isset($filtros["respuestas"]))
            $query->where("respuestas", "like" ,  "%" . $filtros["respuestas"] . "%");

        $models = $query->paginate();
        $models->appends($filtros);

        return view("blockchain.index",["model"=>$models, "filtros"=>$request]);
    }
    public function details(Log $log){
        return view("blockchain.details", ["log"=>$log]);
    }
}
