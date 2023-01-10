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
        Hospital::cursor()->each(function ($hospital){
            echo "Sistema: " . $hospital->nombre . "\n";
            $last = $hospital->lastIndice;
            $post_params = [];
            if($last){
                $post_params = ["last"=>$last->created_at];
                echo "último registro: $last->created_at \n";
            }
            $curl = new \App\Tools\CurlHelper($hospital->url . "update/",$post_params);
            $data = [];
            if($hospital->version == "v1")
                $data = $curl->get();
            else
                $data = $curl->postJWT();
            $err = $data;
            $data = json_decode($data);
            if($data){
                foreach($data as $elemento){
                    echo $elemento->curp;
                    $indice = Indice::where("curp",$elemento->curp)->first();
                    if(!$indice) $indice = $this->generarIndice($elemento);
                    else $this->actualizarIndice($elemento, $indice);
                    if($indice->id && HospitalIndice::where("hospital_id", $hospital->id)->where("indice_id", $indice->id)->count() == 0){
                        $hi = new HospitalIndice();
                        $hi->hospital_id = $hospital->id;
                        $hi->indice_id = $indice->id;
                        echo ($hi->save()? " Nuevo registro ":" No se guardo ")."\n";
                    }
                    if(isset($elemento->borrar) && $elemento->borrar){
                        echo (HospitalIndice::where("hospital_id", $hospital->id)->where("indice_id", $indice->id)->delete()?"Borrado":"Error") . "\n";
                    }
                }
            }
        });
        return 0;
    }

    private function generarIndice($elemento){
        $indice = new Indice();
        if( isset($elemento->curp) && $elemento->curp ){
            $indice->curp = $elemento->curp;
            if(isset($elemento->telefono) && $elemento->telefono && isset($elemento->nombre) && $elemento->nombre && isset($elemento->email) && $elemento->email){
                $indice->telefono = $elemento->telefono;
                $indice->nombre = $elemento->nombre;
                $indice->email = $elemento->email;
                echo ($indice->save()?"Nuevo Indice":"no se guardo"). "\n";
                return $indice;
            }
        }
        return false;
    }

    private function actualizarIndice($elemento, $indice){
        if(isset($elemento->telefono) && $elemento->telefono && isset($elemento->nombre) && $elemento->nombre && isset($elemento->email) && $elemento->email){
            $indice->telefono = $elemento->telefono;
            $indice->nombre = $elemento->nombre;
            $indice->email = $elemento->email;
            echo $indice->save()?" Actualizado\n":" no se guardo\n";
        }
    }
}
