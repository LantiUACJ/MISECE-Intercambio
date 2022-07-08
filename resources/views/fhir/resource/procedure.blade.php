@if (env("TEST", false))
    <div class="row">
        <div class="col 12">
            <b>===PROCEDURE===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <p><b>Identificador:</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->instantiatesCanonical))
    <p><b>Instancia:</b></p>
    @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
        <div class="element">
            {{$instantiatesCanonical}}
        </div>
    @endforeach
@endif
@if (isset($obj->instantiatesUri))
    <p><b>Instancia:</b></p>
    @foreach ($obj->instantiatesUri as $instantiatesUri)
        <div class="element">
            {{$instantiatesUri}}
        </div>
    @endforeach
@endif
@if (isset($obj->basedOn))
    <p><b>Basado en:</b></p>
    @foreach ($obj->basedOn as $basedOn)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$basedOn])
        </div>
    @endforeach
@endif
@if (isset($obj->partOf))
    <p><b>Parte de:</b></p>
    @foreach ($obj->partOf as $partOf)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$partOf])
        </div>
    @endforeach
@endif
@if (isset($obj->status))
    <p><b>Estado:</b>
        {{ str_replace(
            ["preparation", "in-progress", "not-done", "on-hold", "stopped", "completed", "entered-in-error","unknown"], 
            ["En preparación", "En progreso", "Sin completar", "En espera", "Detenido", "Completo", "Con error", "Desconocido"], strtolower($obj->status))}}
    </p>
@endif
@if (isset($obj->statusReason))
    <p><b>motivo del estado:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->statusReason])
    </div>
@endif
@if (isset($obj->category))
    <p><b>Categoría:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->category])
    </div>
@endif
@if (isset($obj->code))
    <p><b>Código:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </div>
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
@if (isset($obj->performedDateTime))
    <p><b>Fecha de ejercución:</b></p>
    <div class="element">
        {{$obj->performedDateTime}}
    </div>
@endif
@if (isset($obj->performedPeriod))
    <p><b>Fecha de ejercución:</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->performedPeriod])
    </div>
@endif
@if (isset($obj->performedString))
    <p><b>Fecha de ejercución:</b></p>
    <div class="element">
        {{$obj->performedString}}
    </div>
@endif
@if (isset($obj->performedAge))
    <p><b>Fecha de ejercución:</b></p>
    <div class="element">
        @include('fhir.element.age',["obj"=>$obj->performedAge])
    </div>
@endif
@if (isset($obj->performedRange))
    <p><b>Fecha de ejercución:</b></p>
    <div class="element">
        @include('fhir.element.range',["obj"=>$obj->performedRange])
    </div>
@endif
@if (isset($obj->recorder))
    <p><b>Registrador:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->recorder])
    </div>
@endif
@if (isset($obj->asserter))
    <p><b>Afirmador:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->asserter])
    </div>
@endif
@if (isset($obj->performer))
    <p><b>Ejecutores:</b></p>
    @foreach ($obj->performer as $performer)
        <div class="element">
            @if (isset($performer->function))
                <p><b>Función</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                </div>
            @endif
            @if (isset($performer->actor))
                <p><b>Actor</b></p>
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$performer->actor])
                </div>
            @endif
            @if (isset($performer->onBehalfOf))
                <p><b>Trabaja para</b></p>
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$performer->onBehalfOf])
                </div>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->location))
    <p><b>Localización</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->location])
    </div>
@endif
@if (isset($obj->reasonCode))
    <p><b>Código de motivo:</b></p>
    @foreach ($obj->reasonCode as $reasonCode)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
        </div>
    @endforeach
@endif
@if (isset($obj->reasonReference))
    <p><b>Referencia de la motivo:</b></p>
    @foreach ($obj->reasonReference as $reasonReference)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$reasonReference])
        </div>
    @endforeach
@endif
@if (isset($obj->bodySite))
    <p><b>Sitio del cuerpo:</b></p>
    @foreach ($obj->bodySite as $bodySite)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$bodySite])
        </div>
    @endforeach
@endif
@if (isset($obj->outcome))
    <p><b>Resultado</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->outcome])
    </div>
@endif
@if (isset($obj->report))
    <p><b>Reporte:</b></p>
    @foreach ($obj->report as $report)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$report])
        </div>
    @endforeach
@endif
@if (isset($obj->complication))
    <p><b>Complicación:</b></p>
    @foreach ($obj->complication as $complication)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$complication])
        </div>
    @endforeach
@endif
@if (isset($obj->complicationDetail))
    <p><b>Detalle de complicación:</b></p>
    @foreach ($obj->complicationDetail as $complicationDetail)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$complicationDetail])
        </div>
    @endforeach
@endif
@if (isset($obj->followUp))
    <p><b>Seguimiento:</b></p>
    @foreach ($obj->followUp as $followUp)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$followUp])
        </div>
    @endforeach
@endif
@if (isset($obj->note))
    <p><b>Nota:</b></p>
    @foreach ($obj->note as $note)
        <div class="element">
            @include('fhir.element.annotation',["obj"=>$note])
        </div>
    @endforeach
@endif
@if (isset($obj->focalDevice))
    <p><b>Dispositivos Focales:</b></p>
    <div class="element">
        @foreach ($obj->focalDevice as $focalDevice)
            @if (isset($focalDevice->action))
                <p><b>Acción:</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$focalDevice->action])
                </div>
            @endif
            @if (isset($focalDevice->manipulated))
                <p><b>Manipulado:</b></p>
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$focalDevice->manipulated])
                </div>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->usedReference))
    <p><b>Referencia usada:</b></p>
    @foreach ($obj->usedReference as $usedReference)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$usedReference])
        </div>
    @endforeach
@endif
@if (isset($obj->usedCode))
    <p><b>Código usado:</b></p>
    @foreach ($obj->usedCode as $usedCode)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$usedCode])
        </div>
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-PROCEDURE===</b>
        </div>
    </div>
@endif