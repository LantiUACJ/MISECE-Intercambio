@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===ENCOUNTER===</b></div></div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->identifier))
    <div class="row">
        <div class="col s12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            @if (sizeof($obj->identifier)>1)
                <div class="col s6">
            @else
                <div class="col s12">
            @endif
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            <b>Estado:</b>
            {{str_replace(["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"], ["Planeada", "Llegado", "Triaje", "En progreso", "En salida", "Terminada", "Cancelada"],$obj->status)}}
        </div>
    </div>
@endif
@if (isset($obj->statusHistory))
    <div class="row">
        <div class="col s12">
            Historial de estados:
        </div>
        @foreach ($obj->statusHistory as $statusHistory)
            <div class="col s12">
                <div class="row">
                    @if (isset($statusHistory->status))
                        <div class="col s6">
                            <b>Estado:</b> <br>
                            {{str_replace(["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"], ["Planeada", "Llegado", "Triaje", "En progreso", "En salida", "Terminada", "Cancelada",], $statusHistory->status)}}
                        </div>                        
                    @endif
                    @if ($statusHistory->period)
                        <div class="col s6">
                            <b>Período:</b> <br>
                            @include('fhir.element.period',["obj"=>$statusHistory->period])
                        </div>      
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->classHistory))
    @foreach ($obj->classHistory as $classHistory)
        @if (isset($classHistory->coding))
            <div class="row">
                <div class="col s12">
                    Código
                </div>
                <div class="col s12">
                    @include('fhir.element.coding',["obj"=>$classHistory->coding])
                </div>
            </div>
        @endif
        @if (isset($classHistory->period))
            <div class="row">
                <div class="col s12">
                    Período
                </div>
                <div class="col s12">
                    @include('fhir.element.period',["obj"=>$classHistory->period])
                </div>
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->class))
    <div class="row">
        <div class="col s2">
            Clase
        </div>
        <div class="col s10">
            <div class="row">
                @include('fhir.element.coding',["obj"=>$obj->class])
            </div>
        </div>
    </div>
@endif
@if (isset($obj->type))
    <div class="row">
        <div class="col s2">
            Tipo:
        </div>
        <div class="col s10">
            <div class="row">
                @foreach ($obj->type as $type)
                    @if (sizeof($obj->type)>1)
                        <div class="col s6">
                    @else
                        <div class="col s12">
                    @endif
                        @include('fhir.element.codeableConcept',["obj"=>$type])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if (isset($obj->serviceType))
    <div class="row">
        <div class="col s12">
            Tipo de servicio
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->serviceType])
        </div>
    </div>
@endif
@if (isset($obj->priority))
    <div class="row">
        <div class="col s12">
            Prioridad
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->priority])
        </div>
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Sujeto
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->episodeOfCare))
    <div class="row">
        <div class="col s12">
            Episodio de cuidado:
        </div>
        @foreach ($obj->episodeOfCare as $episodeOfCare)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$episodeOfCare])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col s12">
            Basado en:
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>
@endif

@if (isset($obj->participant))
    @foreach ($obj->participant as $participant)
        @if (isset($participant->type))
            <div class="row">
                <div class="col s12">
                    Tipo
                </div>
                @foreach ($participant->type as $type)
                    <div class="col s6">
                        @include('fhir.element.codeableConcept',["obj"=>$type])
                    </div>
                @endforeach
            </div>
        @endif
        @if (isset($participant->period))
            <div class="row">
                <div class="col s12">
                    Período
                </div>
                <div class="col s12">
                    @include('fhir.element.period',["obj"=>$participant->period])
                </div>
            </div>
        @endif
        @if (isset($participant->individual))
            <div class="row">
                <div class="col s12">
                    Involucrado
                </div>
                <div class="col s12">
                    @include('fhir.element.reference',["obj"=>$participant->individual])
                </div>
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->appointment))
    <div class="row">
        <div class="col s12">
            Cita:
        </div>
        @foreach ($obj->appointment as $appointment)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$appointment])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->period))
    <div class="row">
        <div class="col s12">
            Período
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->period])
        </div>
    </div>
@endif
@if (isset($obj->length))
    <div class="row">
        <div class="col s12">
            Duración
        </div>
        <div class="col s12">
            @include('fhir.element.duration',["obj"=>$obj->length])
        </div>
    </div>
@endif
@if (isset($obj->reasonCode))
    <div class="row">
        <div class="col s12">
            Código de motivo:
        </div>
        @foreach ($obj->reasonCode as $reasonCode)
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->reasonReference))
    <div class="row">
        <div class="col s12">
            Referencia a motivo:
        </div>
        @foreach ($obj->reasonReference as $reasonReference)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$reasonReference])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->diagnosis))
    @foreach ($obj->diagnosis as $diagnosis)
        @if (isset($diagnosis->condition))
            <div class="row">
                <div class="col s12">
                    Condición
                </div>
                <div class="col s12">
                    @include('fhir.element.reference',["obj"=>$diagnosis->condition])
                </div>
            </div>
        @endif
        @if (isset($diagnosis->use))
            <div class="row">
                <div class="col s12">
                    Uso
                </div>
                <div class="col s12">
                    @include('fhir.element.codeableConcept',["obj"=>$diagnosis->use])
                </div>
            </div>
        @endif
        @if (isset($diagnosis->rank))
            <div class="row">
                <div class="col s12">
                    Rango
                </div>
                <div class="col s12">
                    {{$diagnosis->rank}}
                </div>
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->account))
    <div class="row">
        <div class="col s12">
            Cuenta:
        </div>
        @foreach ($obj->account as $account)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$account])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->hospitalization))
    @if (isset($obj->hospitalization->preAdmissionIdentifier))
        <div class="row">
            <div class="col s12">
                Identificador de pre-admisión
            </div>
            <div class="col s12">
                @include('fhir.element.identifier',["obj"=>$preAdmissionIdentifier])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->origin))
        <div class="row">
            <div class="col s12">
                Origen
            </div>
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$origin])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->admitSource))
        <div class="row">
            <div class="col s12">
                Fuente de admisión
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$admitSource])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->reAdmission))
        <div class="row">
            <div class="col s12">
                Re-admisión
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$reAdmission])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->dietPreference))
        <div class="row">
            <div class="col s12">
                Dieta recomendada
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$dietPreference])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->specialCourtesy))
        <div class="row">
            <div class="col s12">
                Cortesía especial
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$specialCourtesy])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->specialArrangement))
        <div class="row">
            <div class="col s12">
                Arreglo especial
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$specialArrangement])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->destination))
        <div class="row">
            <div class="col s12">
                Destino
            </div>
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$destination])
            </div>
        </div>
    @endif
    @if (isset($obj->hospitalization->dischargeDisposition))
        <div class="row">
            <div class="col s12">
                Disposición de descarga
            </div>
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->dischargeDisposition])
            </div>
        </div>
    @endif
@endif
@if (isset($obj->location))
    @foreach ($obj->location as $location)
        @if (isset($location->location))
            <div class="row">
                <div class="col s12">
                    Localización
                </div>
                <div class="col s12">
                    @include('fhir.element.reference',["obj"=>$location->location])
                </div>
            </div>
        @endif
        @if (isset($location->status))
            <div class="row">
                <div class="col s12">
                    Estado: {{str_replace(["planned", "active", "reserved", "completed"], ["Planeado", "Activo", "Reservado", "Completado"], $location->status)}}
                </div>
            </div>
            
        @endif
        @if (isset($location->physicalType))
            <div class="row">
                <div class="col s12">
                    Tipo de lugar
                </div>
                <div class="col s12">
                    @include('fhir.element.codeableConcept',["obj"=>$location->physicalType])
                </div>
            </div>
        @endif
        @if (isset($location->period))
            <div class="row">
                <div class="col s12">
                    Período
                </div>
                <div class="col s12">
                    @include('fhir.element.period',["obj"=>$location->period])
                </div>
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->serviceProvider))
    <div class="row">
        <div class="col s12">
            Provedor de servicios
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->serviceProvider])
        </div>
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col s12">
            Parte de
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->partOf])
        </div>
    </div>
@endif
@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===END-ENCOUNTER===</b></div></div>
@endif