@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===MEDICATIONADMINISTRATION===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->instantiates) && $obj->instantiates)
    <p><b>Instancia:</b></p>
    @foreach ($obj->instantiates as $instantiates)
        <div class="element">
            {{$instantiates}}
        </div>
    @endforeach
@endif
@if (isset($obj->partOf) && $obj->partOf)
    <p><b>Parte de:</b></p>
    @foreach ($obj->partOf as $partOf)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$partOf])
        </div>
    @endforeach
@endif
@if (isset($obj->status))
    <p><b>Estatdo:</b>
        {{str_replace(
            ["in-progress", "not-done", "on-hold", "completed", "entered-in-error", "stopped", "unknown"], 
            ["En progreso", "Sin completar", "En espera", "Completado", "Ingresado en error", "Detenida", "Desconocido"], $obj->status)}}
    </p>
@endif
@if (isset($obj->statusReason) && $obj->statusReason)
    <p><b>Razón del estado:</b></p>
    @foreach ($obj->statusReason as $statusReason)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$statusReason])
        </div>
    @endforeach
@endif
@if (isset($obj->category))
    <p><b>Categoría:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->category])
    </div>
@endif
@if (isset($obj->medicationCodeableConcept))
    <p><b>Medicación:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->medicationCodeableConcept])
    </div>
@endif
@if (isset($obj->medicationReference))
    <p><b>Medicación</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->medicationReference])
    </div>
@endif
@if (isset($obj->subject))
    <p><b>Sujeto</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->subject])
    </div>
@endif
@if (isset($obj->context))
    <p><b>Contexto</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->context])
    </div>
@endif
@if (isset($obj->supportingInformation))
    <p><b>Información de soporte</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->supportingInformation])
    </div>
@endif
@if (isset($obj->effectiveDateTime))
    <p><b>Fecha y hora de vigencia</b></p>
    <div class="element">
        {{$obj->effectiveDateTime}}
    </div>
@endif
@if (isset($obj->effectivePeriod))
    <p><b>Período de vigencia</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
    </div>
@endif
@if (isset($obj->performer) && $obj->performer)
    <p><b>Ejecutor:</b></p>
    @foreach ($obj->performer as $performer)
        <div class="element">
            @if (isset($performer->function))
                <p><b>Función:</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                </div>
            @endif
            @if (isset($performer->actor))
                <p><b>Actor:</b></p>
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$performer->actor])
                </div>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->reasonCode) && $obj->reasonCode)
    <p><b>Código de Motivo:</b></p>
    @foreach ($obj->reasonCode as $reasonCode)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
        </div>
    @endforeach
@endif
@if (isset($obj->reasonReference) && $obj->reasonReference)
    <p><b>Referencia al motivo:</b></p>
    @foreach ($obj->reasonReference as $reasonReference)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$reasonReference])
        </div>
    @endforeach
@endif
@if (isset($obj->request))
    <p><b>Petición:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->request])
    </div>
@endif
@if (isset($obj->device) && $obj->device)
    <p><b>Dispositivo:</b></p>
    @foreach ($obj->device as $device)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$device])
        </div>
    @endforeach
@endif
@if (isset($obj->note) && $obj->note)
    <p><b>Nota:</b></p>
    @foreach ($obj->note as $note)
        <div class="element">
            @include('fhir.element.annotation',["obj"=>$note])
        </div>
    @endforeach
@endif
@if (isset($obj->dosage))
    <p><b>Dosis:</b></p>
    @if (isset($obj->dosage["text"]))
        <p><b>Texto:</b></p>
        <div class="element">
            {{$obj->dosage["text"]}}
        </div>
    @endif
    @if (isset($obj->dosage["site"]))
        <p><b>Sitio:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->dosage["site"]])
        </div>    
    @endif
    @if (isset($obj->dosage["route"]))
        <p><b>Ruta:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->dosage["route"]])
        </div>    
    @endif
    @if (isset($obj->dosage["method"]))
        <p><b>Método:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->dosage["method"]])
        </div>    
    @endif
    @if (isset($obj->dosage["dose"]))
        <p><b>Dosis:</b></p>
        <div class="element">
            @include('fhir.element.quantity',["obj"=>$obj->dosage["dose"]])
        </div>    
    @endif
    @if (isset($obj->dosage["rateRatio"]))
        <p><b>Razón de tasas:</b></p>
        <div class="element">
            @include('fhir.element.ratio',["obj"=>$obj->dosage["rateRatio"]])
        </div>    
    @endif
    @if (isset($obj->dosage["rateQuantity"]))
        <p><b>Cantidad:</b></p>
        <div class="element">
            @include('fhir.element.quantity',["obj"=>$obj->dosage["rateQuantity"]])
        </div>
    @endif
@endif
@if (isset($obj->eventHistory) && $obj->eventHistory)
    <p><b>Historia de eventos:</b></p>
    @foreach ($obj->eventHistory as $eventHistory)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$eventHistory])
        </div>
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===END-MEDICATIONADMINISTRATION===</b>
        </div>
    </div>
@endif