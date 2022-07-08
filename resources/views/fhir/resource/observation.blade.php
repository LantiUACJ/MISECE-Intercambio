@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===OBSERVATION===</b>
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
@if (isset($obj->status))
    <p><b>Estado:</b>
        {{ str_replace(["registered", "preliminary", "final", "amended"], ["Registrado", "Preliminar", "Final", "Corregida"], $obj->status) }}
    </p>
@endif
@if (isset($obj->issued))
    <p><b>Emitida:</b>
        {{$obj->issued}}
    </p>
@endif
@if (isset($obj->basedOn))
    <p><b>Basado en:</b></p>
    @foreach ($obj->basedOn as $basedOn)
        <div class="element">
            * @include('fhir.element.reference',["obj"=>$basedOn]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->partOf))
    <p><b>Parte de:</b></p>
    @foreach ($obj->partOf as $partOf)
        <div class="element">
            * @include('fhir.element.reference',["obj"=>$partOf]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->category))
    <p><b>Categoría:</b></p>
    @foreach ($obj->category as $category)
        <div class="element">
            * @include('fhir.element.codeableConcept',["obj"=>$category]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->code))
    <p><b>Código:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </p>
@endif
@if (isset($obj->subject))
    <p><b>Sujeto:</b>
        @include('fhir.element.reference',["obj"=>$obj->subject])
    </p>
@endif
@if (isset($obj->focus))
    <p><b>Enfoque:</b></p>
    <div class="element">
        @foreach ($obj->focus as $focus)
            * @include('fhir.element.reference',["obj"=>$focus]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->encounter))
    <p><b>Visita:</b>
        @include('fhir.element.reference',["obj"=>$obj->encounter])
    </p>
@endif
@if (isset($obj->effectiveDateTime))
    <p><b>Vigencia:</b>
        {{$obj->effectiveDateTime}}
    </p>
@endif
@if (isset($obj->effectivePeriod))
    <p><b>Vigencia:</b>
        @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
    </p>
@endif
@if (isset($obj->effectiveTiming))
    <p><b>Vigencia:</b>
        @include('fhir.element.timing',["obj"=>$obj->effectiveTiming])
    </p>
@endif
@if (isset($obj->effectiveInstant))
    <p><b>Vigencia:</b>
        {{$obj->effectiveInstant}}
    </p>
@endif
@if (isset($obj->performer))
    <p><b>Ejecutor:</b></p>
    @foreach ($obj->performer as $performer)
        <div class="element">
            * @include('fhir.element.reference',["obj"=>$performer]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->valueQuantity))
    <p><b>Valor:</b>
        @include('fhir.element.quantity',["obj"=>$obj->valueQuantity])
    </p>
@endif
@if (isset($obj->valueCodeableConcept))
    <p><b>Valor:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->valueCodeableConcept])
    </p>
@endif
@if (isset($obj->valueString))
    <p><b>Valor:</b>
        {{$obj->valueString}}
    </p>
@endif
@if (isset($obj->valueBoolean))
    <p><b>Valor:</b>
        {{$obj->valueBoolean}}
    </p>
@endif
@if (isset($obj->valueInteger))
    <p><b>Valor:</b>
        {{$obj->valueInteger}}
    </p>
@endif
@if (isset($obj->valueRange))
    <p><b>Valor:</b>
        @include('fhir.element.range',["obj"=>$obj->valueRange])
    </p>
@endif
@if (isset($obj->valueRatio))
    <p><b>Valor:</b>
        @include('fhir.element.ratio',["obj"=>$obj->valueRatio])
    </p>
@endif
@if (isset($obj->valueSampledData))
    <p><b>Valor:</b>
        @include('fhir.element.sampleData',["obj"=>$obj->valueSampledData])
    </p>
@endif
@if (isset($obj->valueTime))
    <p><b>Valor:</b>
        {{$obj->valueTime}}
    </p>
@endif
@if (isset($obj->valueDateTime))
    <p><b>Valor:</b>
        {{$obj->valueDateTime}}
    </p>
@endif
@if (isset($obj->valuePeriod))
    <p><b>Valor:</b>
        @include('fhir.element.ratio',["obj"=>$obj->valuePeriod])
    </p>
@endif
@if (isset($obj->dataAbsentReason))
    <p><b>Razón de ausencia de datos:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->dataAbsentReason])
    </p>
@endif
@if (isset($obj->interpretation))
    <p><b>Interpretación:</b></p>
    @foreach ($obj->interpretation as $interpretation)
        <div class="element">
            * @include('fhir.element.codeableConcept',["obj"=>$interpretation]) <br>
        </div>
    @endforeach
@endif
@if (isset($obj->note))
    <p><b>Nota:</b></p>
    <div class="element">
        @foreach ($obj->note as $note)
            * @include('fhir.element.annotation',["obj"=>$note]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->bodySite))
    <p><b>Sitio del cuerpo:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->bodySite])
    </p>
@endif
@if (isset($obj->method))
    <p><b>Método:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->method])
    </p>
@endif
@if (isset($obj->specimen))
    <p><b>Especimen:</b>
        @include('fhir.element.reference',["obj"=>$obj->specimen])
    </p>
@endif
@if (isset($obj->device))
    <p><b>Dispositivo:</b>
        @include('fhir.element.reference',["obj"=>$obj->device])
    </p>
@endif
@if (isset($obj->referenceRange))
    @if (isset($obj->referenceRange->low))
        <p><b>Bajo:</b>
            @include('fhir.element.quantity',["obj"=>$obj->referenceRange->low])
        </p>
    @endif
    @if (isset($obj->referenceRange->high))
        <p><b>Alto</b>
            @include('fhir.element.quantity',["obj"=>$obj->referenceRange->high])
        </p>
    @endif
    @if (isset($obj->referenceRange->type))
        <p><b>Tipo</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->referenceRange->type])
        </p>
    @endif
    @if (isset($obj->referenceRange->appliesTo))
        <p><b>Aplica a:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->referenceRange->appliesTo])
        </p>
    @endif
    @if (isset($obj->referenceRange->age))
        <p><b>Edad:</b>
            @include('fhir.element.range',["obj"=>$obj->referenceRange->age])
        </p>
    @endif
    @if (isset($obj->referenceRange->text))
        <p><b>Texto:</b>
            {{$obj->referenceRange->text}}
        </p>
    @endif
@endif
@if (isset($obj->hasMember))
    <p><b>Miembro:</b></p>
    <div class="element">
        @foreach ($obj->hasMember as $hasMember)
            * @include('fhir.element.reference',["obj"=>$hasMember]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->derivedFrom))
    <p><b>Dervidado de:</b></p>
    <div class="element">
        @foreach ($obj->derivedFrom as $derivedFrom)
            * @include('fhir.element.reference',["obj"=>$derivedFrom]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->component))
    @if (isset($obj->component->code))
        <p><b>Código:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->component->code])
        </p>
    @endif
    @if (isset($obj->component->valueQuantity))
        <p><b>Valor:</b>
            @include('fhir.element.quantity',["obj"=>$obj->component->valueQuantity])
        </p>
    @endif
    @if (isset($obj->component->valueCodeableConcept))
        <p><b>Valor:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->component->valueCodeableConcept])
        </p>
    @endif
    @if (isset($obj->component->valueString))
        <p><b>Valor:</b>
            {{$obj->component->valueString}}
        </p>
    @endif
    @if (isset($obj->component->valueBoolean))
        <p><b>Valor:</b>
            {{$obj->component->valueBoolean?"true":"false"}}
        </p>
    @endif
    @if (isset($obj->component->valueInteger))
        <p><b>Valor:</b>
            {{$obj->component->valueInteger}}
        </p>
    @endif
    @if (isset($obj->component->valueRange))
        <p><b>Valor:</b>
            @include('fhir.element.range',["obj"=>$obj->component->valueRange])
        </p>
    @endif
    @if (isset($obj->component->valueRatio))
        <p><b>Valor:</b>
            @include('fhir.element.ratio',["obj"=>$obj->component->valueRatio])
        </p>
    @endif
    @if (isset($obj->component->valueSampledData))
        <p><b>Valor:</b>
            @include('fhir.element.sampleData',["obj"=>$obj->component->valueSampledData])
        </p>
    @endif
    @if (isset($obj->component->valueTime))
        <p><b>Valor:</b>
            {{$obj->component->valueTime}}
        </p>
    @endif
    @if (isset($obj->component->valueDateTime))
        <p><b>Valor:</b>
            {{$obj->component->valueDateTime}}
        </p>
    @endif
    @if (isset($obj->component->period))
        <p><b>Periodo:</b>
            @include('fhir.element.period',["obj"=>$obj->component->period])
        </p>
    @endif
    @if (isset($obj->component->dataAbsentReason))
        <p><b>Razón de ausencia de datos:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->component->dataAbsentReason])
        </p>
    @endif
    @if (isset($obj->interpretation))
        <p><b>Interpretación</b></p>
        <div class="element">
            @foreach ($obj->interpretation as $interpretation)
                * @include('fhir.element.codeableConcept',["obj"=>$interpretation]) <br>
            @endforeach
        </div>
    @endif
    @if (isset($obj->referenceRange))
        <p><b>Rango de referencia:</b></p>
        <div class="element">
            @foreach ($obj->referenceRange as $referenceRange)
                * @include('fhir.element.codeableConcept',["obj"=>$referenceRange]) <br>
            @endforeach
        </div>
    @endif
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===END-OBSERVATION===</b>
        </div>
    </div>
@endif