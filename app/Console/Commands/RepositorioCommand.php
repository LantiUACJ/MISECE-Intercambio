<?php

namespace App\Console\Commands;

use App\Models\Repositorio;
use App\Models\Indice;
use App\Tools\V1\ApiHelper;
use Illuminate\Console\Command;

class RepositorioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repositorio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza la consulta a los ECEs para consultar datos para el repositorio';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $repositorio = \App\Models\Repositorio::where("activa", 1)->first();
        if($repositorio){
            foreach(\App\Models\Indice::cursor() as $indice){
                $apiHelper = new \App\Tools\V1\ApiHelper([
                    "curp"=>$indice->curp, 
                    "consultor"=>"Repositorio",
                    "type"=>1,
                    "codigo"=>"11111",
                ]);
                $apiHelper->searchPatient();
                if(!$apiHelper->isValid()) continue;

                $apiHelper->getData();
                if(!$apiHelper->isValid()) continue;

                $data = $apiHelper->retriveData();
                foreach($data as $element){
                    if(isset($element["bundle"])){
                        $curl = new \App\Tools\CurlHelper(env("REPOSITORIO_URL")."api/store",["bundle"=>$element["bundle"]->toJson()]);
                        $response = $curl->postJWT();
                    }
                }
            }
            $repositorio->activa = 0;
            $repositorio->save();
            echo "Done\n";
        }
        else{
            echo "No petition found\n";
        }
    }
}
