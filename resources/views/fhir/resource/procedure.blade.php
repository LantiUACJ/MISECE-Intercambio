@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===PROCEDURE===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-12">
            Identificador:
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->instantiatesCanonical))
    <div class="row">
        <div class="col-12">
            Instancia:
        </div>
        @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
            <div class="col-6">
                {{$instantiatesCanonical}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->instantiatesUri))
    <div class="row">
        <div class="col-12">
            Instancia:
        </div>
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            <div class="col-6">
                {{$instantiatesUri}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col-12">
            Basado en:
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col-12">
            Parte de:
        </div>
        @foreach ($obj->partOf as $partOf)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$partOf])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col-12">
            Estado <br>
            {{ str_replace(["preparation", "in-progress", "not-done", "on-hold", "stopped", "completed", "entered-in-error","unknown"], ["En preparación", "En progreso", "Sin completar", "En espera", "Detenido", "Completo", "Con error", "Desconocido"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->statusReason))
    <div class="row">
        <div class="col-12">
            motivo del estado <br>
            @include('fhir.element.codeableConcept',["obj"=>$obj->statusReason])
        </div>
    </div>
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col-12">
            Categoría <br>
            @include('fhir.element.codeableConcept',["obj"=>$obj->category])
        </div>
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col-12">
            Código <br>
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col-12">
            Sujeto <br>
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col-12">
            Visita <br>
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->performedDateTime))
    <div class="row">
        <div class="col-12">
            Fecha de ejercución <br>
            {{$obj->performedDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->performedPeriod))
    <div class="row">
        <div class="col-12">
            Fecha de ejercución <br>
            @include('fhir.element.period',["obj"=>$obj->performedPeriod])
        </div>
    </div>
@endif
@if (isset($obj->performedString))
    <div class="row">
        <div class="col-12">
            Fecha de ejercución <br>
            {{$obj->performedString}}
        </div>
    </div>
@endif
@if (isset($obj->performedAge))
    <div class="row">
        <div class="col-12">
            Fecha de ejercución <br>
            td>@include('fhir.element.age',["obj"=>$obj->performedAge])
        </div>
    </div>
@endif
@if (isset($obj->performedRange))
    <div class="row">
        <div class="col-12">
            Fecha de ejercución <br>
            td>@include('fhir.element.range',["obj"=>$obj->performedRange])
        </div>
    </div>
@endif
@if (isset($obj->recorder))
    <div class="row">
        <div class="col-12">
            Registrador <br>
            @include('fhir.element.reference',["obj"=>$obj->recorder])
        </div>
    </div>
@endif
@if (isset($obj->asserter))
    <div class="row">
        <div class="col-12">
            Afirmador <br>
            @include('fhir.element.reference',["obj"=>$obj->asserter])
        </div>
    </div>
@endif
@if (isset($obj->performer))
    <div class="row">
        <div class="col-12">
            Ejecutores:
        </div>
        @foreach ($obj->performer as $performer)
            @if (isset($performer->function))
                <div class="col-6">
                    Funcion
                    @include('fhir.element.codeableConcept',["obj"=>$performer->function])
                </div>
            @endif
            @if (isset($performer->actor))
                <div class="col-6">
                    Actor
                    @include('fhir.element.reference',["obj"=>$performer->actor])
                </div>
            @endif
            @if (isset($performer->onBehalfOf))
                <div class="col-6">
                    Trabaja para
                    @include('fhir.element.reference',["obj"=>$performer->onBehalfOf])
                </div>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->location))
    <div class="row">
        <div class="col-12">
            Localización <br>
            @include('fhir.element.reference',["obj"=>$obj->location])
        </div>
    </div>
@endif
@if (isset($obj->reasonCode))
    <div class="row">
        <div class="col-12">
            Código de motivo:
        </div>
        @foreach ($obj->reasonCode as $reasonCode)
            <div class="col-6">
                @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->reasonReference))
    <div class="row">
        <div class="col-12">
            Referencia de la motivo:
        </div>
        @foreach ($obj->reasonReference as $reasonReference)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$reasonReference])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->bodySite))
    <div class="row">
        <div class="col-12">
            Sitio del cuerpo:
        </div>
        @foreach ($obj->bodySite as $bodySite)
            <div class="col-6">
                @include('fhir.element.codeableConcept',["obj"=>$bodySite])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->outcome))
    <div class="row">
        <div class="col-12">
            Resultado <br>
            @include('fhir.element.codeableConcept',["obj"=>$obj->outcome])
        </div>
    </div>
@endif
@if (isset($obj->report))
    <div class="row">
        <div class="col-12">
            Reporte:
        </div>
        @foreach ($obj->report as $report)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$report])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->complication))
    <div class="row">
        <div class="col-12">
            Complicación:
        </div>
        @foreach ($obj->complication as $complication)
            <div class="col-6">
                @include('fhir.element.codeableConcept',["obj"=>$complication])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->complicationDetail))
    <div class="row">
        <div class="col-12">
            Detalle de complicación:
        </div>
        @foreach ($obj->complicationDetail as $complicationDetail)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$complicationDetail])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->followUp))
    <div class="row">
        <div class="col-12">
            Seguimiento:
        </div>
        @foreach ($obj->followUp as $followUp)
            <div class="col-6">
                @include('fhir.element.codeableConcept',["obj"=>$followUp])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->note))
    <div class="row">
        <div class="col-12">
            Nota:
        </div>
        @foreach ($obj->note as $note)
            <div class="col-6">
                @include('fhir.element.annotation',["obj"=>$note])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->focalDevice))
    <div class="row">
        <div class="col-12">
            Dispositivos Focales:
        </div>
        <div class="col-12">
            <div class="row">
                @foreach ($obj->focalDevice as $focalDevice)
                    @if (isset($focalDevice->action))
                        <div class="col-6">
                            Acción
                            @include('fhir.element.codeableConcept',["obj"=>$focalDevice->action])
                        </div>
                    @endif
                    @if (isset($focalDevice->manipulated))
                        <div class="col-6">
                            Manipulado
                            @include('fhir.element.reference',["obj"=>$focalDevice->manipulated])
                        </div>
                    @endif
            @endforeach
            </div>
        </div>
    </div>
@endif
@if (isset($obj->usedReference))
    <div class="row">
        <div class="col-12">
            Referencia usada:
        </div>
        @foreach ($obj->usedReference as $usedReference)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$usedReference])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->usedCode))
    <div class="row">
        <div class="col-12">
            Código usado:
        </div>
        @foreach ($obj->usedCode as $usedCode)
            <div class="col-6">
                @include('fhir.element.codeableConcept',["obj"=>$usedCode])
            </div>
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-PROCEDURE===</b>
        </div>
    </div>
@endif