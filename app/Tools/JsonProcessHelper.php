<?php 
namespace App\Tools;

use \Carbon\Carbon;

class JsonProcessHelper{

    public function __construct($data){
        $this->data = $data;
        $this->regex =  '/([0-9]([0-9]([0-9][1-9]|[1-9]0)|[1-9]00)|[1-9]000)(-(0[1-9]|1[0-2])(-(0[1-9]|[1-2][0-9]|3[0-1])(T([01][0-9]|2[0-3]):[0-5][0-9]:([0-5][0-9]|60)(\.[0-9]+)?(Z|(\+|-)((0[0-9]|1[0-3]):[0-5][0-9]|14:00)))?)?)?/';
    }

    public function sortDesc(){
        $expedientes = [];
        foreach($this->data as $expediente){
            $recursos = [];
            $recursos_sin_fecha = [];
            foreach($expediente["bundle"]->entry as $id => $resource){
                $fecha = $this->getFecha($resource);
                if($fecha){
                    $recursos[($fecha->getTimestamp()*100)+$id] = $resource;
                }
                else{
                    $recursos_sin_fecha[] = $resource;
                }
            }
            krsort($recursos);
            $bundle = $expediente["bundle"];
            $bundle->entry = array_merge($recursos, $recursos_sin_fecha);
            $expedientes[] = [
                "bundle"=>$bundle,
                "hospital"=>$expediente["hospital"],
            ];
        }
        //dd(["Org"=> $this->data, "Mod"=>$expedientes]);
        return $expedientes;
    }

    public function getFecha($resource){
        if(isset($resource->resource) && $resource->resource)
            return false;
        switch($resource->resource->resourceType){
            case "AllergyIntolerance":
                return $this->getFechaAllergyIntolerance($resource->resource);
            break;
            case "CarePlan":
                return $this->getFechaCarePlan($resource->resource);
            break;
            case "Composition":
                return $this->getFechaComposition($resource->resource);
            break;
            case "Condition":
                return $this->getFechaCondition($resource->resource);
            break;
            case "DiagnosticReport":
                return $this->getFechaDiagnosticReport($resource->resource);
            break;
            case "ImageStudy":
                return $this->getFechaImageStudy($resource->resource);
            break;
            case "Location":
                return $this->getFechaLocation($resource->resource);
            break;
            case "Medication":
                return $this->getFechaMedication($resource->resource);
            break;
            case "MedicationAdministration":
                return $this->getFechaMedicationAdministration($resource->resource);
            break;
            case "Observation":
                return $this->getFechaObservation($resource->resource);
            break;
            case "Organization":
                return $this->getFechaOrganization($resource->resource);
            break;
            case "Patient":
                return Carbon::now();
            break;
            case "Practitioner":
                return $this->getFechaPractitioner($resource->resource);
            break;
            case "Procedure":
                return $this->getFechaProcedure($resource->resource);
            break;
        }
    }

    public function getFechaAllergyIntolerance($resource){
        $fecha = isset($resource->onsetDateTime)?$resource->onsetDateTime:false;
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaCarePlan($resource){
        $fecha = isset($resource->onsetDateTime)?$resource->onsetDateTime:false;
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaComposition($resource){
        $fecha = isset($resource->date)?$resource->date:false;
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaCondition($resource){
        $fecha = isset($resource->onsetPeriod)?$resource->onsetPeriod:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaDiagnosticReport($resource){
        $fecha = isset($resource->effectivePeriod)?$resource->effectivePeriod:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaEncounter($resource){
        $fecha = isset($resource->period)?$resource->period:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaImageStudy($resource){
        $fecha = isset($resource->started)?$resource->started:false;
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaLocation($resource){
        return false;
    }
    public function getFechaMedication($resource){
        return false;
    }
    public function getFechaMedicationAdministration($resource){
        $fecha = isset($resource->effectivePeriod)?$resource->effectivePeriod:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaObservation($resource){
        $fecha = isset($resource->effectivePeriod)?$resource->effectivePeriod:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
    public function getFechaOrganization($resource){
        return false;
    }
    public function getFechaPractitioner($resource){
        return false;
    }
    public function getFechaProcedure($resource){
        $fecha = isset($resource->performedPeriod)?$resource->performedPeriod:false;
        if(isset($fecha->start))
            $fecha = $fecha->start;
        else if (isset($fecha->end))
            $fecha = $fecha->end;
        
        if($fecha){
            if(preg_match($this->regex,$fecha)){
                $dff = new DateFormatFhir($fecha);
                $fecha = $dff->getDate();
            }
        }
        return $fecha;
    }
}