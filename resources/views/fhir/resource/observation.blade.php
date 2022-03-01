<div class="row">
    <div class="col-xs-12">
        <b>===OBSERVATION===</b>
    </div>
</div>
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->identifier))
    <div class="row">
        <div class="col-xs-12">
            Identificador:
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-xs-6 bloque">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif

<div class="row">
    @if (isset($obj->status))
        <div class="col-xs-12">
            Estado {{ str_replace(["registered", "preliminary", "final", "amended"], ["Registrado", "Preliminar", "Final", "Corregida"], $obj->status) }}
        </div>
    @endif
    @if (isset($obj->issued))
        <div class="col-xs-12">
            Emitida: {{$obj->issued}}
        </div>
    @endif
</div>
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col-xs-12">Basado en:</div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col-xs-6 bloque">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col-xs-12">
            Parte de
        </div>
    </div>
    @foreach ($obj->partOf as $partOf)
        <div class="col-xs-6 bloque">
            @include('fhir.element.reference',["obj"=>$partOf])
        </div>
    @endforeach
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col-xs-12">
            Categoría
        </div>
        @foreach ($obj->category as $category)
            <div class="col-xs-6">
                @include('fhir.element.codeableConcept',["obj"=>$category])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col-xs-12">
            Código
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col-xs-12">
            Sujeto
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->focus))
    <div class="row">
        <div class="col-xs-12">
            Enfoque
        </div>
        <div class="col-xs-6">
            @foreach ($obj->focus as $focus)
                @include('fhir.element.reference',["obj"=>$focus])
            @endforeach
        </div>
    </div>
    
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col-xs-12">
            Visita
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->effectiveDateTime) || isset($obj->effectivePeriod) || isset($obj->effectiveTiming) || isset($obj->effectiveInstant))
    <div class="row">
        <div class="col-xs-2">
            Vigencia:
        </div>
        <div class="col-xs-8">
            @if (isset($obj->effectiveDateTime))
                {{$obj->effectiveDateTime}}
            @endif
            @if (isset($obj->effectivePeriod))
                @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
            @endif
            @if (isset($obj->effectiveTiming))
                @include('fhir.element.timing',["obj"=>$obj->effectiveTiming])
            @endif
            @if (isset($obj->effectiveInstant))
                {{$obj->effectiveInstant}}
            @endif
        </div>
    </div>
@endif
@if (isset($obj->performer))
    <div class="row">
        <div class="col-xs-12">
            Ejecutor:
        </div>
        @foreach ($obj->performer as $performer)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$performer])
            </div>
        @endforeach
    </div>
@endif
@if ( isset($obj->valueQuantity) || isset($obj->valueCodeableConcept) || isset($obj->valueString) || isset($obj->valueBoolean) || isset($obj->valueInteger) || isset($obj->valueRange) || isset($obj->valueRatio) || isset($obj->valueSampledData) || isset($obj->valueTime) || isset($obj->valueDateTime) || isset($obj->valuePeriod) )
    <div class="row">
        <div class="col-xs-2">
            Valor:
        </div>
    </div>
    <div class="col-xs-10">
        @if (isset($obj->valueQuantity))
            @include('fhir.element.quantity',["obj"=>$obj->valueQuantity])
        @endif
        @if (isset($obj->valueCodeableConcept))
            @include('fhir.element.codeableConcept',["obj"=>$obj->valueCodeableConcept])
        @endif
        @if (isset($obj->valueString))
            {{$obj->valueString}}
        @endif
        @if (isset($obj->valueBoolean))
            {{$obj->valueBoolean}}
        @endif
        @if (isset($obj->valueInteger))
            {{$obj->valueInteger}}
        @endif
        @if (isset($obj->valueRange))
            @include('fhir.element.range',["obj"=>$obj->valueRange])
        @endif
        @if (isset($obj->valueRatio))
            @include('fhir.element.ratio',["obj"=>$obj->valueRatio])
        @endif
        @if (isset($obj->valueSampledData))
            @include('fhir.element.sampleData',["obj"=>$obj->valueSampledData])
        @endif
        @if (isset($obj->valueTime))
            {{$obj->valueTime}}
        @endif
        @if (isset($obj->valueDateTime))
            {{$obj->valueDateTime}}
        @endif
        @if (isset($obj->valuePeriod))
            @include('fhir.element.ratio',["obj"=>$obj->valuePeriod])
        @endif
    </div>
@endif
@if (isset($obj->dataAbsentReason))
    <div class="row">
        <div class="col-xs-12">
            Razón de ausencia de datos
        </div>
        <div class="col-xs-6">
            @include('fhir.element.codeableConcept',["obj"=>$obj->dataAbsentReason])
        </div>
    </div>
@endif
@if (isset($obj->interpretation))
    <div class="row">
        <div class="col-xs-12">
            Interpretación
        </div>
        @foreach ($obj->interpretation as $interpretation)
            <div class="col-xs-6">
                @include('fhir.element.codeableConcept',["obj"=>$interpretation])
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
@if (isset($obj->bodySite))
    <div class="row">
        <div class="col-xs-12">
            Sitio del cuerpo
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->bodySite])
        </div>
    </div>
@endif
@if (isset($obj->method))
    <div class="row">
        <div class="col-xs-12">
            Método
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->method])
        </div>
    </div>
@endif
@if (isset($obj->specimen))
    <div class="row">
        <div class="col-xs-12">
            Especimen
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->specimen])
        </div>
    </div>
@endif
@if (isset($obj->device))
    <div class="row">
        <div class="col-xs-12">
            Dispositivo
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->device])
        </div>
    </div>
@endif
@if (isset($obj->referenceRange))
    @if (isset($obj->referenceRange->low))
        <div class="row">
            <div class="col-xs-12">
                Bajo
            </div>
            <div class="col-xs-12">
                @include('fhir.element.quantity',["obj"=>$obj->referenceRange->low])
            </div>
        </div>
    @endif
    @if (isset($obj->referenceRange->high))
        <div class="row">
            <div class="col-xs-12">
            Alto
            </div>
            <div class="col-xs-12">
            @include('fhir.element.quantity',["obj"=>$obj->referenceRange->high])
            </div>
        </div>
    @endif
    @if (isset($obj->referenceRange->type))
        <div class="row">
            <div class="col-xs-12">
            Tipo
            </div>
            <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->referenceRange->type])
            </div>
        </div>
    @endif
    @if (isset($obj->referenceRange->appliesTo))
        <div class="row">
            <div class="col-xs-12">
            Aplica a
            </div>
            <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->referenceRange->appliesTo])
            </div>
        </div>
    @endif
    @if (isset($obj->referenceRange->age))
        <div class="row">
            <div class="col-xs-12">
            Edad
            </div>
            <div class="col-xs-12">
            @include('fhir.element.range',["obj"=>$obj->referenceRange->age])
            </div>
        </div>
    @endif
    @if (isset($obj->referenceRange->text))
        <div class="row">
            <div class="col-xs-12">
            Texto
            </div>
            <div class="col-xs-12">
            {{$obj->referenceRange->text}}
            </div>
        </div>
    @endif
@endif
@if (isset($obj->hasMember))
    <div class="row">
        <div class="col-xs-12">
            Miembro
        </div>
        @foreach ($obj->hasMember as $hasMember)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$hasMember])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->derivedFrom))
    <div class="row">
        <div class="col-xs-12">
            Dervidado de
        </div>
        @foreach ($obj->derivedFrom as $derivedFrom)
            <div class="col-xs-6">
                @include('fhir.element.reference',["obj"=>$derivedFrom])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->component))
    @if (isset($obj->component->code))
        <div class="row">
            <div class="col-xs-12">
                Código
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->component->code])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueQuantity))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                @include('fhir.element.quantity',["obj"=>$obj->component->valueQuantity])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueCodeableConcept))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->component->valueCodeableConcept])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueString))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                {{$obj->component->valueString}}
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueBoolean))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                {{$obj->component->valueBoolean?"true":"false"}}
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueInteger))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                {{$obj->component->valueInteger}}
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueRange))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                @include('fhir.element.range',["obj"=>$obj->component->valueRange])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueRatio))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                @include('fhir.element.ratio',["obj"=>$obj->component->valueRatio])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueSampledData))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                @include('fhir.element.sampleData',["obj"=>$obj->component->valueSampledData])
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueTime))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                {{$obj->component->valueTime}}
            </div>
        </div>
    @endif
    @if (isset($obj->component->valueDateTime))
        <div class="row">
            <div class="col-xs-12">
                Valor
            </div>
            <div class="col-xs-12">
                {{$obj->component->valueDateTime}}
            </div>
        </div>
    @endif
    @if (isset($obj->component->period))
        <div class="row">
            <div class="col-xs-12">
                Periodo
            </div>
            <div class="col-xs-12">
                @include('fhir.element.period',["obj"=>$obj->component->period])
            </div>
        </div>
    @endif
    @if (isset($obj->component->dataAbsentReason))
        <div class="row">
            <div class="col-xs-12">
                Razón de ausencia de datos
            </div>
            <div class="col-xs-12">
                @include('fhir.element.codeableConcept',["obj"=>$obj->component->dataAbsentReason])
            </div>
        </div>
    @endif
    @if (isset($obj->interpretation))
        <div class="row">
            <div class="col-xs-12">
                Interpretación
            </div>
            @foreach ($obj->interpretation as $interpretation)
                <div class="col-xs-6">
                    @include('fhir.element.codeableConcept',["obj"=>$interpretation])
                </div>
            @endforeach
        </div>
    @endif
    @if (isset($obj->referenceRange))
        <div class="row">
            <div class="col-xs-12">
                Rango de referencia
            </div>
            @foreach ($obj->referenceRange as $referenceRange)
                <div class="col-xs-6">
                    @include('fhir.element.codeableConcept',["obj"=>$referenceRange])
                </div>
            @endforeach
        </div>
    @endif
@endif

<div class="row">
    <div class="col-xs-12">
        <b>===END-OBSERVATION===</b>
    </div>
</div>