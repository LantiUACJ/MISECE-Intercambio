<div class="row">
    <div class="col-xs-12">
        <b>===MEDICATIONADMINISTRATION===</b>
    </div>
</div>
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->identifier))
    <div class="row">
        <div class="col-xs-12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-xs-6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->instantiates))
    <div class="row">
        <div class="col-xs-12">
            Instancia
        </div>
        @foreach ($obj->instantiates as $instantiates)
            <div class="col-xs-6">
                {{$instantiates}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col-xs-12">
            Parte de
        </div>
        @foreach ($obj->partOf as $partOf)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$partOf])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col-xs-12">
            Estatdo: {{str_replace( ["in-progress", "not-done", "on-hold", "completed", "entered-in-error", "stopped", "unknown"], ["En progreso", "Sin completar", "En espera", "Completado", "Ingresado en error", "Detenida", "Desconocido"], $obj->status)}}
        </div>
    </div>
@endif
@if (isset($obj->statusReason))
    <div class="row">
        <div class="col-xs-12">Razón del estado</div>
        @foreach ($obj->statusReason as $statusReason)
            <div class="col-xs-6">
                @include('fhir.element.codeableConcept',["obj"=>$statusReason])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col-xs-12">
            Categoría
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->category])
        </div>
    </div>
@endif
@if (isset($obj->medicationCodeableConcept))
    <div class="row">
        <div class="col-xs-12">
            Medicación
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->medicationCodeableConcept])
        </div>
    </div>
@endif
@if (isset($obj->medicationReference) || isset($obj->subject) || isset($obj->context) || isset($obj->supportingInformation))
    <div class="row">
        @if (isset($obj->medicationReference))
            <div class="col-xs-6">
                <b>Medicación</b> <br>
                @include('fhir.element.reference',["obj"=>$obj->medicationReference])
            </div>
        @endif
        @if (isset($obj->subject))
            <div class="col-xs-6">
                <b>Sujeto</b> <br>
                @include('fhir.element.reference',["obj"=>$obj->subject])
            </div>
        @endif
        @if (isset($obj->context))
            <div class="col-xs-6">
                <b>Contexto</b> <br>
                @include('fhir.element.reference',["obj"=>$obj->context])
            </div>
        @endif
        @if (isset($obj->supportingInformation))
            <div class="col-xs-6">
                <b>Información de soporte</b> <br>
                @include('fhir.element.reference',["obj"=>$obj->supportingInformation])
            </div>
        @endif
    </div>
@endif



@if (isset($obj->effectiveDateTime))
    <div class="row">
        <div class="col-xs-12">
            Fecha y hora de vigencia
        </div>
        <div class="col-xs-12">
            {{$obj->effectiveDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->effectivePeriod))
    <div class="row">
        <div class="col-xs-12">
            Período de vigencia
        </div>
        <div class="col-xs-12">
            @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
        </div>
    </div>
@endif
@if (isset($obj->performer))
    <div class="row">
        <div class="col-xs-12">
            Ejecutor:
        </div>
        @foreach ($obj->performer as $performer)
            <div class="col-xs-12">
                <div class="row bloque">
                    @if (isset($performer->function))
                        <div class="col-xs-6">
                            Función: <br>
                            @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                        </div>
                    @endif
                    @if (isset($performer->actor))
                        <div class="col-xs-6">
                            Actor: <br>
                            @include('fhir.element.reference',["obj"=>$performer->actor])
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->reasonCode))
    <div class="row">
        <div class="col-xs-12">
            Código de Motivo
        </div>
        @foreach ($obj->reasonCode as $reasonCode)
            <div class="col-xs-6">
                @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->reasonReference))
    <div class="row">
        <div class="col-xs-12">
            Referencia al motivo
        </div>
        @foreach ($obj->reasonReference as $reasonReference)
            <div class="col-xs-12">
                @include('fhir.element.reference',["obj"=>$reasonReference])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->request))
    <div class="row">
        <div class="col-xs-12">
            Petición
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->request])
        </div>
    </div>
@endif
@if (isset($obj->device))
    <div class="row">
        <div class="col-xs-12">
            Dispositivo
        </div>
        @foreach ($obj->device as $device)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$device])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->note))
    <div class="row">
        <div class="col-xs-12">
            Nota
        </div>
        @foreach ($obj->note as $note)
            <div class="col-xs-6">
                @include('fhir.element.annotation',["obj"=>$note])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->dosage))
    <div class="row">
        <div class="col-xs-12">
            <b>Dosis</b>
        </div>
    </div>
    @if (isset($obj->dosage->text))
        <div class="row">
            <div class="col-xs-12">
                Texto
            </div>
            <div class="col-xs-12">
                {{$obj->dosage->text}}
            </div>
        </div>
    @endif
    @if (isset($obj->dosage->site))
        <div class="row">
            <div class="col-xs-12">
                Sitio
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->dosage->site])
            </div>
        </div>    
    @endif
    @if (isset($obj->dosage->route))
        <div class="row">
            <div class="col-xs-12">
                Ruta
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->dosage->route])
            </div>
        </div>    
    @endif
    @if (isset($obj->dosage->method))
        <div class="row">
            <div class="col-xs-12">
                Método
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->dosage->method])
            </div>
        </div>    
    @endif
    @if (isset($obj->dosage->dose))
        <div class="row">
            <div class="col-xs-12">
                Dosis
            </div>
            <div class="col-xs-12">
                @include('fhir.element.quantity',["obj"=>$obj->dosage->dose])
            </div>
        </div>    
    @endif
    @if (isset($obj->dosage->rateRatio))
        <div class="row">
            <div class="col-xs-12">
                Razón de tasas
            </div>
            <div class="col-xs-12">
                @include('fhir.element.ratio',["obj"=>$obj->dosage->rateRatio])
            </div>
        </div>    
    @endif
    @if (isset($obj->dosage->rateQuantity))
        <div class="row">
            <div class="col-xs-12">
                Cantidad
            </div>
            <div class="col-xs-12">
                @include('fhir.element.quantity',["obj"=>$obj->dosage->rateQuantity])
            </div>
        </div>
    @endif
@endif
@if (isset($obj->eventHistory))
    <div class="row">
        <div class="col-xs-12">
            Historia de eventos
        </div>
        @foreach ($obj->eventHistory as $eventHistory)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$eventHistory])
            </div>
        @endforeach
    </div>
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-MEDICATIONADMINISTRATION===</b>
    </div>
</div>