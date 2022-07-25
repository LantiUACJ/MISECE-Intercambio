@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===IMAGINGSTUDY===</b>
        </div>
    </div>
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
    <p><b>Estado:</b></p>
    <div class="element">
        {{ str_replace(
            ["registered", "available","cancelled","entered-in-error","unknown"], 
            ["Registrado", "Disponible", "Cancelado", "Con error", "Desconocido"], strtolower($obj->status))}}
    </div>
@endif
@if (isset($obj->modality) && $obj->modality)
    <p><b>Modalidad:</b></p>
    @foreach ($obj->modality as $modality)
        <div class="element">
            @include('fhir.element.coding',["obj"=>$modality])
        </div>
    @endforeach
@endif
@if (isset($obj->subject))
    <p><b>Sujeto:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->subject])
    </div>
@endif
@if (isset($obj->encounter))
    <p><b>Visita:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->encounter])
    </div>
@endif
@if (isset($obj->started))
    <p><b>Iniciada:</b></p>
    <div class="element">
        {{$obj->started}}
    </div>
@endif
@if (isset($obj->basedOn) && $obj->basedOn)
    <p><b>Basado en:</b></p>
    @foreach ($obj->basedOn as $basedOn)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$basedOn])
        </div>
    @endforeach
@endif
@if (isset($obj->referrer))
    <p><b>Referente:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->referrer])
    </div>
@endif
@if (isset($obj->interpreter) && $obj->interpreter)
    <p><b>Interprete:</b></p>
    @foreach ($obj->interpreter as $interpreter)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$interpreter])
        </div>
    @endforeach
@endif
@if (isset($obj->endpoint) && $obj->endpoint)
    <p><b>Punto final:</b></p>
    @foreach ($obj->endpoint as $endpoint)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$endpoint])
        </div>
    @endforeach    
@endif
@if (isset($obj->numberOfSeries))
    <p><b>Número de series:</b></p>
    <div class="element">
        {{$obj->numberOfSeries}}
    </div>
@endif
@if (isset($obj->numberOfInstances))
    <p><b>Número de instancias:</b></p>
    <div class="element">
        {{$obj->numberOfInstances}}
    </div>
@endif
@if (isset($obj->procedureReference))
    <p><b>Prodecimiento:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->procedureReference])
    </div>
@endif
@if (isset($obj->location))
    <p><b>Localización:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->location])
    </div>
@endif
@if (isset($obj->reasonCode) && $obj->reasonCode)
    <p><b>Código de motivo:</b></p>
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
@if (isset($obj->note) && $obj->note)
    <p><b>Nota:</b></p>
    @foreach ($obj->note as $note)
        <div class="element">
            @include('fhir.element.annotation',["obj"=>$note])
        </div>    
    @endforeach    
@endif
@if (isset($obj->description))
    <p><b>Descripción:</b></p>
    <div class="element">
        {{$obj->description}}
    </div>
@endif
@if (isset($obj->series) && $obj->series)
    <p><b>Series:</b></p>
    @foreach ($obj->series as $series)
        @if (isset($series->uid))
            <p><b>UID:</b></p>
            <div class="element">
                {{$series->uid}}
            </div>
        @endif
        @if (isset($series->number))
            <p><b>Número:</b></p>
            <div class="element">
                {{$series->number}}
            </div>
        @endif
        @if (isset($series->modality))
            <p><b>Modalidad:</b></p>
            <div class="element">
                @include('fhir.element.coding',["obj"=>$series->modality])
            </div>
        @endif
        @if (isset($series->description))
            <p><b>Descripción:</b></p>
            <div class="element">
                {{$series->description}}
            </div>
        @endif
        @if (isset($series->numberOfInstances))
            <p><b>Número de Instancias:</b></p>
            <div class="element">
                @include('fhir.element.codeableConcept',["obj"=>$series->numberOfInstances])
            </div>
        @endif
        @if (isset($series->endpoint) && $series->endpoint)
            <p><b>Punto final:</b></p>
            @foreach ($series->endpoint as $endpoint)
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$endpoint])
                </div>
            @endforeach
        @endif
        @if (isset($series->bodySite))
            <p><b>Parte del cuerpo:</b></p>
            <div class="element">
                @include('fhir.element.coding',["obj"=>$series->bodySite])
            </div>
        @endif
        @if (isset($series->laterality))
            <p><b>Lateralidad:</b></p>
            <div class="element">
                @include('fhir.element.coding',["obj"=>$series->laterality])
            </div>
        @endif
        @if (isset($series->specimen) && $series->specimen)
            <p><b>Especimen:</b></p>
            @foreach ($series->specimen as $specimen)
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$specimen])
                </div>
            @endforeach
        @endif
        @if (isset($series->started))
            <p><b>Iniciada el:</b></p>
            <div class="element">
                {{$series->started}}
            </div>
        @endif
        @if (isset($series->performer) && $series->performer)
            <p><b>Ejecutores:</b></p>
            @foreach ($series->performer as $performer)
                @if (isset($performer->function))
                    <div class="element">
                        <p><b>Funcion:</b></p>
                        <div class="element">
                            @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                        </div>
                    </div>
                @endif
                @if (isset($performer->actor))
                    <div class="element">
                        <p><b>Actor</b></p>
                        <div class="element">
                            @include('fhir.element.reference',["obj"=>$performer->actor])
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        @if (isset($series->instance) && $series->instance)
            <p><b>Instancia:</b></p>
            <div class="element">
                @foreach ($series->instance as $instance)
                    @if (isset($instance["uid"]))
                        <p><b>uid:</b></p>
                        <div class="element">
                            {{$instance["uid"]}}
                        </div>
                    @endif
                    @if (isset($instance["number"]))
                        <p><b>Número:</b></p>
                        <div class="element">
                            {{$instance["number"]}}
                        </div>
                    @endif
                    @if (isset($instance["title"]))
                        <p><b>Título:</b></p>
                        <div class="element">
                            {{$instance["title"]}}
                        </div>
                    @endif
                    @if (isset($instance["sopClass"]))
                        <p><b>clase DICOM:</b></p>
                        <div class="element">
                            @include('fhir.element.coding',["obj"=>$instance["sopClass"]])
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-IMAGINGSTUDY===</b>
        </div>
    </div>
@endif