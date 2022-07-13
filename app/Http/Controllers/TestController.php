<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testIndice(Request $request){
        $start_time = microtime(true);
        $hospital = auth()->user()->hospital;
        $post_params = [];
        if($request->input("fecha", false)){
            $post_params = ["last"=>$request->input("fecha")];
        }
        else{
            $post_params = ["last"=>null];
        }
        $curl = new \App\Tools\CurlHelper($hospital->url . "update/",$post_params);
        $data = $curl->get();
        $end_time = microtime(true);
        $execution_time = ($end_time - $start_time);
        return view("test.indice",["hospital"=>$hospital, "fecha"=>$request->input("fecha","sin fecha"), "data"=>$data, "tiempo"=>$execution_time]);
    }

    public function testProcesamiento(){
        $curl = new \App\Tools\CurlHelper( env("MODULO_PROCESAMIENTO") , []);

        return view("test.procesamiento",["respuesta"=>$curl->get()]);
    }
}
