<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Indice;
use App\Models\HospitalIndice;
use App\Models\Hospital;

class UpdateIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:indice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza el índice';

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
        Hospital::all()->each(function ($hospital){
            echo "Hospital encontrado\n";
            $last = $hospital->lastIndice;
            $post_params = [];
            if($last){
                $post_params = ["last"=>$last->created_at];
                echo "último registro: $last->created_at \n";
            }
            echo $hospital->url . "update\n";
            $curl = new \App\Tools\CurlHelper($hospital->url . "update/",$post_params);
            $data = json_decode($curl->get());
            echo "datos adquiridos\n";
            if($data){
                print_r(["data"=>$data]);
                echo "tiene datos\n";
                foreach($data as $elemento){
                    echo $elemento->curp;
                    echo "\n";
                    $indice = Indice::where("curp",$elemento->curp)->first();
                    if(!$indice){
                        $indice = new Indice();
                        $indice->curp = $elemento->curp;
                        if(isset($elemento->telefono) && isset($elemento->nombre) && isset($elemento->email)){
                            $indice->telefono = $elemento->telefono;
                            $indice->nombre = $elemento->nombre;
                            $indice->email = $elemento->email;
                            echo $indice->save()?" Nuevo Indice ":" no se guardo ";
                        }
                        else{
                            echo "Registro ignorado, no hay teléfono";
                        }
                        echo "\n";
                    }
                    if(HospitalIndice::where("hospital_id", $hospital->id)->where("indice_id", $indice->id)->count() == 0){
                        $hi = new HospitalIndice();
                        $hi->hospital_id = $hospital->id;
                        $hi->indice_id = $indice->id;
                        echo $hi->save()? " Nuevo registro ":" No se guardo ";
                    }
                    echo "\n";
                }
            }
        });
        return 0;
    }
}
