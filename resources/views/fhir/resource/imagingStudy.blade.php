<div class="row">
    <div class="col-xs-12">
        <b>===IMAGINGSTUDY===</b>
    </div>
</div>
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-xs-12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-xs-12">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col-xs-12">
            Estado
        </div>
        <div class="col-xs-12-">
            {{ str_replace(["registered", "available","cancelled","entered-in-error","unknown"], ["Registrado", "Disponible", "Cancelado", "Con error", "Desconocido"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->modality))
    <div class="row">
        <div class="col-xs-12">
            Modalidad
        </div>
        @foreach ($obj->modality as $modality)
            <div class="col-xs-12">
                @include('fhir.element.coding',["obj"=>$modality])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col-xs-12">
            Sujeto
        </div>
        <div class="col-xs-12-">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col-xs-12">
            Visita
        </div>
        <div class="col-xs-12-">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->started))
    <div class="row">
        <div class="col-xs-12">
            Iniciada
        </div>
        <div class="col-xs-12-">
            {{$obj->started}}
        </div>
    </div>
@endif
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col-xs-12">
            Basado en
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col-xs-12">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->referrer))
    <div class="row">
        <div class="col-xs-12">
            Referente
        </div>
        <div class="col-xs-12-">
            @include('fhir.element.reference',["obj"=>$obj->referrer])
        </div>
    </div>
@endif
@if (isset($obj->interpreter))
    <div class="row">
        <div class="col-xs-12">
            Interprete
        </div>
    </div>
    @foreach ($obj->interpreter as $interpreter)
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$interpreter])
        </div>
    @endforeach
@endif

@if (isset($obj->endpoint))
    <div class="row">
        <div class="col-xs-12">
            Punto final
        </div>
    </div>
    @foreach ($obj->endpoint as $endpoint)
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$endpoint])
        </div>
    @endforeach    
@endif
@if (isset($obj->numberOfSeries))
    <div class="row">
        <div class="col-xs-12">
            Número de series
        </div>
        <div class="col-xs-12-">
            {{$obj->numberOfSeries}}
        </div>
    </div>
@endif
@if (isset($obj->numberOfInstances))
    <div class="row">
        <div class="col-xs-12">
            Número de instancias
        </div>
        <div class="col-xs-12-">
            {{$obj->numberOfInstances}}
        </div>
    </div>
@endif
@if (isset($obj->procedureReference))
    <div class="row">
        <div class="col-xs-12">
            Prodecimiento
        </div>
        <div class="col-xs-12-">
            @include('fhir.element.reference',["obj"=>$obj->procedureReference])
        </div>
    </div>
@endif
@if (isset($obj->location))
    <div class="row">
        <div class="col-xs-12">
            Localización
        </div>
        <div class="col-xs-12-">
            @include('fhir.element.reference',["obj"=>$obj->location])
        </div>
    </div>
@endif
@if (isset($obj->reasonCode))
    <div class="row">
        <div class="col-xs-12">
            Código de motivo
        </div>
        @foreach ($obj->reasonCode as $reasonCode)
            <div class="col-xs-12">
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
@if (isset($obj->note))
    <div class="row">
        <div class="col-xs-12">
            Nota
        </div>
    </div>
    @foreach ($obj->note as $note)
        <div class="col-xs-12">
            @include('fhir.element.annotation',["obj"=>$note])
        </div>    
    @endforeach    
@endif

@if (isset($obj->description))
    <div class="row">
        <div class="col-xs-12">
            Descripción
        </div>
        <div class="col-xs-12-">
            {{$obj->description}}
        </div>
    </div>
@endif
@if (isset($obj->series))
    <div class="row">
        <div class="col-xs-12">
            Series:
        </div>
    </div>
    @foreach ($obj->series as $series)
        <div class="row">
            @if (isset($series->uid))
                <div class="col-xs-2">
                    UID
                </div>
                <div class="col-xs-10">
                    {{$series->uid}}
                </div>
            @endif
            @if (isset($series->number))
                <div class="col-xs-2">
                    Número
                </div>
                <div class="col-xs-10">
                    {{$series->number}}
                </div>
            @endif
            @if (isset($series->modality))
                <div class="col-xs-2">
                    Modalidad
                </div>
                <div class="col-xs-10">
                    @include('fhir.element.coding',["obj"=>$series->modality])
                </div>
            @endif
            @if (isset($series->description))
                <div class="col-xs-2">
                    Descripción
                </div>
                <div class="col-xs-10">
                    {{$series->description}}
                </div>
            @endif
            @if (isset($series->numberOfInstances))
                <div class="col-xs-2">
                    Número de Instancias
                </div>
                <div class="col-xs-10">
                    @include('fhir.element.codeableConcept',["obj"=>$series->numberOfInstances])
                </div>
            @endif
            @if (isset($series->endpoint))
                <div class="col-xs-12">
                    Punto final <br>
                    <div class="row">
                        @foreach ($series->endpoint as $endpoint)
                            <div class="col-xs-6">
                                @include('fhir.element.reference',["obj"=>$endpoint])
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (isset($series->bodySite))
                <div class="col-xs-2">
                    Parte del cuerpo
                </div>
                <div class="col-xs-10">
                    @include('fhir.element.coding',["obj"=>$series->bodySite])
                </div>
            @endif
            @if (isset($series->laterality))
                <div class="col-xs-2">
                    Lateralidad
                </div>
                <div class="col-xs-10">
                    @include('fhir.element.coding',["obj"=>$series->laterality])
                </div>
            @endif
            @if (isset($series->specimen))
                <div class="row">
                    <div class="col-xs-12">
                        Especimen
                    </div>
                    @foreach ($series->specimen as $specimen)
                        <div class="col-xs-6">
                            @include('fhir.element.reference',["obj"=>$specimen])
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($series->started))
                <div class="col-xs-2">
                    Iniciada el
                </div>
                <div class="col-xs-10">
                    {{$series->started}}
                </div>
            @endif
            @if (isset($series->performer))
                <div class="col-xs-12">
                    <b>Ejecutores:</b> <br>
                    @foreach ($series->performer as $performer)
                        <div class="row">
                            @if (isset($performer->function))
                                <div class="col-xs-6">
                                    Funcion: <br>
                                    @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                                </div>
                            @endif
                            @if (isset($performer->actor))
                                <div class="col-xs-6">
                                    Actor <br>
                                    @include('fhir.element.reference',["obj"=>$performer->actor])
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($series->instance))
                <div class="col-xs-12">
                    Instancia: <br>
                    @foreach ($series->instance as $instance)
                        <div class="row">
                            @if (isset($instance->uid))
                                <div class="col-xs-3">
                                    uid <br>
                                    {{$instance->uid}}
                                </div>
                            @endif
                            @if (isset($instance->number))
                                <div class="col-xs-3">
                                    Número <br>
                                    {{$instance->number}}
                                </div>
                            @endif
                            @if (isset($instance->title))
                                <div class="col-xs-3">
                                    Título <br>
                                    {{$instance->title}}
                                </div>
                            @endif
                            @if (isset($instance->sopClass))
                                <div class="col-xs-12">
                                    clase DICOM <br>
                                    @include('fhir.element.coding',["obj"=>$instance->sopClass])
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-IMAGINGSTUDY===</b>
    </div>
</div>