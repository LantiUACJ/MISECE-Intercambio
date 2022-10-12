@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===ENCOUNTER===</b></div></div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador:</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->status))
    <p><b>Estado:</b>{{str_replace(
            ["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"], 
            ["Planeada", "Llegado", "Triaje", "En progreso", "En salida", "Terminada", "Cancelada"],$obj->status)}}
    </p>
@endif
@if (isset($obj->statusHistory) && $obj->statusHistory)
    <p><b>Historial de estados:</b></p>
    <div class="element">
        @foreach ($obj->statusHistory as $statusHistory)
            <hr>
            @if (isset($statusHistory["status"]))
                <p><b>Estado:</b>
                    {{str_replace(
                        ["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"], 
                        ["Planeada", "Llegado", "Triaje", "En progreso", "En salida", "Terminada", "Cancelada",], $statusHistory["status"])}}
                </p>
            @endif
            @if (isset($statusHistory["period"]))
                <p><b>Período:</b>
                    @include('fhir.element.period',["obj"=>$statusHistory["period"]])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->classHistory) && $obj->classHistory)
    <p><b>Clase de historial:</b></p>
    <div class="element">
        @foreach ($obj->classHistory as $classHistory)
            <hr>
            @if (isset($classHistory->class))
                <p><b>Código:</b>
                    @include('fhir.element.coding',["obj"=>$classHistory->class])
                </p>
            @endif
            @if (isset($classHistory->period))
                <p><b>Período:</b>
                    @include('fhir.element.period',["obj"=>$classHistory->period])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->class))
    <p><b>Clase:</b>
        @include('fhir.element.coding',["obj"=>$obj->class])
    </p>
@endif
@if (isset($obj->type) && $obj->type)
    <p><b>Tipo:</b></p>
    @foreach ($obj->type as $type)
        <div class="element">
            * @include('fhir.element.codeableConcept',["obj"=>$type]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->serviceType))
    <p><b>Tipo de servicio:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->serviceType])
    </p>
@endif
@if (isset($obj->priority))
    <p><b>Prioridad:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->priority])
    </p>
@endif
@if (isset($obj->subject))
    <p><b>Sujeto:</b>
        @include('fhir.element.reference',["obj"=>$obj->subject])
    </p>
@endif
@if (isset($obj->episodeOfCare) && $obj->episodeOfCare)
    <p><b>Episodio de cuidado:</b></p>
    <div class="element">
        @foreach ($obj->episodeOfCare as $episodeOfCare)
            * @include('fhir.element.reference',["obj"=>$episodeOfCare]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn) && $obj->basedOn)
    <p><b>Basado en:</b></p>
    <div class="element">
        @foreach ($obj->basedOn as $basedOn)
            @include('fhir.element.reference',["obj"=>$basedOn])
        @endforeach
    </div>
@endif
@if (isset($obj->participant) && $obj->participant)
    <p><b>Participantes:</b></p>
    <div class="element">
        @foreach ($obj->participant as $participant)
            @if (isset($participant->type) && $participant->type)
                <p><b>Tipo:</b></p>
                <div class="element">
                    @foreach ($participant->type as $type)
                        @include('fhir.element.codeableConcept',["obj"=>$type])
                    @endforeach
                </div>
            @endif
            @if (isset($participant->period))
                <p><b>Período:</b>
                    @include('fhir.element.period',["obj"=>$participant->period])
                </p>
            @endif
            @if (isset($participant->individual))
                <p><b>Involucrado:</b>
                    @include('fhir.element.reference',["obj"=>$participant->individual])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->appointment) && $obj->appointment)
    <p><b>Cita:</b></p>
    <div class="element">
        @foreach ($obj->appointment as $appointment)
            @include('fhir.element.reference',["obj"=>$appointment])
        @endforeach
    </div>
@endif
@if (isset($obj->period))
    <p><b>Período:</b>
        @include('fhir.element.period',["obj"=>$obj->period])
    </p>
@endif
@if (isset($obj->length))
    <p><b>Duración:</b>
        @include('fhir.element.duration',["obj"=>$obj->length])
    </p>
@endif
@if (isset($obj->reasonCode) && $obj->reasonCode)
    <p><b>Código de motivo:</b></p>
    <div class="element">
        @foreach ($obj->reasonCode as $reasonCode)
            * @include('fhir.element.codeableConcept',["obj"=>$reasonCode]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->reasonReference) && $obj->reasonReference)
    <p><b>Referencia a motivo:</b></p>
    <div class="element">
        @foreach ($obj->reasonReference as $reasonReference)
            * @include('fhir.element.reference',["obj"=>$reasonReference]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->diagnosis) && $obj->diagnosis)
    <p><b>Diagnósticos:</b></p>
    <div class="element">
        @foreach ($obj->diagnosis as $diagnosis)
            <hr>
            @if (isset($diagnosis->condition))
                <p><b>Condición</b>
                    @include('fhir.element.reference',["obj"=>$diagnosis->condition])
                </p>
            @endif
            @if (isset($diagnosis->use))
                <p><b>Uso:</b>
                    @include('fhir.element.codeableConcept',["obj"=>$diagnosis->use])
                </p>
            @endif
            @if (isset($diagnosis->rank))
                <p><b>Rango:</b>
                    {{$diagnosis->rank}}
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->account) && $obj->account)
    <p><b>Cuenta:</b></p>
    <div class="element">
        @foreach ($obj->account as $account)
            * @include('fhir.element.reference',["obj"=>$account]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->hospitalization))
    @if (isset($obj->hospitalization->preAdmissionIdentifier))
        <p><b>Identificador de pre-admisión:</b>
            @include('fhir.element.identifier',["obj"=>$obj->hospitalization->preAdmissionIdentifier])
        </p>
    @endif
    @if (isset($obj->hospitalization->origin))
        <p><b>Origen:</b>
            @include('fhir.element.reference',["obj"=>$obj->hospitalization->origin])
        </p>
    @endif
    @if (isset($obj->hospitalization->admitSource))
        <p><b>Fuente de admisión:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->admitSource])
        </p>
    @endif
    @if (isset($obj->hospitalization->reAdmission))
        <p><b>Re-admisión</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->reAdmission])
        </p>
    @endif
    @if (isset($obj->hospitalization->dietPreference))
        <p><b>Dieta recomendada:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->dietPreference])
        </p>
    @endif
    @if (isset($obj->hospitalization->specialCourtesy))
        <p><b>Cortesía especial:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->specialCourtesy])
        </p>
    @endif
    @if (isset($obj->hospitalization->specialArrangement))
        <p><b>Arreglo especial:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->specialArrangement])
        </p>
    @endif
    @if (isset($obj->hospitalization->destination))
        <p><b>Destino:</b>
            @include('fhir.element.reference',["obj"=>$obj->hospitalization->destination])
        </p>
    @endif
    @if (isset($obj->hospitalization->dischargeDisposition))
        <p><b>Disposición de descarga:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->hospitalization->dischargeDisposition])
        </p>
    @endif
@endif
@if (isset($obj->location) && $obj->location)
    <p>Lugar:</p>
    <div class="element">
        @foreach ($obj->location as $location)
            <hr>
            @if (isset($location->location))
                <p><b>Localización</b>
                    @include('fhir.element.reference',["obj"=>$location->location])
                </p>
            @endif
            @if (isset($location->status))
                <p><b>Estado:</b>{{str_replace(
                        ["planned", "active", "reserved", "completed"], 
                        ["Planeado", "Activo", "Reservado", "Completado"], $location->status)}}
                </p>
            @endif
            @if (isset($location->physicalType))
                <p><b>Tipo de lugar</b>
                    @include('fhir.element.codeableConcept',["obj"=>$location->physicalType])
                </p>
            @endif
            @if (isset($location->period))
                <p><b>Período</b>
                    @include('fhir.element.period',["obj"=>$location->period])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->serviceProvider))
    <p><b>Provedor de servicios:</b>
        @include('fhir.element.reference',["obj"=>$obj->serviceProvider])
    </p>
@endif
@if (isset($obj->partOf))
    <p><b>Parte de</b>
        @include('fhir.element.reference',["obj"=>$obj->partOf])
    </p>
@endif
@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===END-ENCOUNTER===</b></div></div>
@endif