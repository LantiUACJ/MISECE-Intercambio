@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===ENCOUNTER===</b></div></div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])

<div class="element">
    @if (isset($obj->identifier) && $obj->identifier)
        <p><b>Identificador:</b></p>
        @foreach ($obj->identifier as $identifier)
            <div class="element">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    @endif
    @if (isset($obj->instantiatesCanonical) && $obj->instantiatesCanonical)
        <p><b>Uri de instancia:</b></p>
        @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
            <div class="element">
                {{$instantiatesCanonical}}
            </div>
        @endforeach
    @endif
    @if (isset($obj->instantiatesUri) && $obj->instantiatesUri)
        <p><b>Uri de instancia:</b></p>
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            <div class="element">
                {{$instantiatesUri}}
            </div>
        @endforeach
    @endif
    @if (isset($obj->status))
        <p><b>Estado:</b></p>
        <div class="element">
            {{$obj->status}} <!-- partial | completed | entered-in-error | health-unknown -->
        </div>
    @endif
    @if (isset($obj->dataAbsentReason))
        <p><b>Razón de ausencia:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept', ["obj"=>$obj->dataAbsentReason])
        </div>
    @endif
    @if (isset($obj->patient))
        <p><b>Paciente:</b></p>
        <div class="element">
            @include('fhir.element.reference', ["obj"=>$obj->patient])
        </div>
    @endif
    @if (isset($obj->date))
        <p><b>Nombre:</b></p>
        <div class="element">
            {{$obj->date}}
        </div>
    @endif
    @if (isset($obj->name))
        <p><b>Nombre:</b></p>
        <div class="element">
            {{$obj->name}}
        </div>
    @endif
    @if (isset($obj->relationship))
        <p><b>Relación:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept', ["obj"=>$obj->relationship])
        </div>
    @endif
    @if (isset($obj->sex))
        <p><b>Sexo:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept', ["obj"=>$obj->sex])
        </div>
    @endif
    @if (isset($obj->bornPeriod))
        <p><b>Fecha de nacimiento:</b></p>
        <div class="element">
            @include('fhir.element.period', ["obj"=>$obj->bornPeriod])
        </div>
    @endif
    @if (isset($obj->bornDate))
        <p><b>Nombre:</b></p>
        <div class="element">
            {{$obj->bornDate}}
        </div>
    @endif
    @if (isset($obj->bornString))
        <p><b>Nombre:</b></p>
        <div class="element">
            {{$obj->bornString}}
        </div>
    @endif
    @if (isset($obj->ageAge))
        <p><b>Fecha de nacimiento:</b></p>
        <div class="element">
            @include('fhir.element.age', ["obj"=>$obj->ageAge])
        </div>
    @endif
    @if (isset($obj->ageRange))
        <p><b>Fecha de nacimiento:</b></p>
        <div class="element">
            @include('fhir.element.range', ["obj"=>$obj->ageRange])
        </div>
    @endif
    @if (isset($obj->ageString))
        <p><b>Fecha de nacimiento:</b></p>
        <div class="element">
            {{$obj->ageString}}
        </div>
    @endif
    @if (isset($obj->estimatedAge))
        <p><b>Fecha de nacimiento:</b></p>
        <div class="element">
            {{$obj->estimatedAge}}
        </div>
    @endif
    @if (isset($obj->deceasedBoolean))
        <div class="element">
            <p><b>Fallecido:</b>{{$obj->deceasedBoolean?"SI":"NO"}}</p>
        </div>
    @endif
    @if (isset($obj->deceasedAge))
        <div class="element">
            <p><b>Fallecido:</b></p>
            @include('fhir.element.age', ["obj"=>$obj->deceasedAge])
        </div>
    @endif
    @if (isset($obj->deceasedRange))
        <p><b>Fallecido:</b></p>
        <div class="element">
            @include('fhir.element.range', ["obj"=>$obj->deceasedRange])
        </div>
    @endif
    @if (isset($obj->deceasedDate))
        <p><b>Fallecido:</b></p>
        <div class="element">
            {{$obj->deceasedDate}}
        </div>
    @endif
    @if (isset($obj->deceasedString))
        <p><b>Fallecido:</b></p>
        <div class="element">
            {{$obj->deceasedString}}
        </div>
    @endif
    @if (isset($obj->reasonCode) && $obj->reasonCode)
        <p><b>Razón del historial:</b></p>
        @foreach ($obj->reasonCode as $reasonCode)
            <div class="element">
                @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
            </div>
        @endforeach
    @endif
    @if (isset($obj->reasonReference) && $obj->reasonReference)
    <p><b>Razón del historial:</b></p>
        @foreach ($obj->reasonReference as $reasonReference)
            <div class="element">
                @include('fhir.element.reference',["obj"=>$reasonReference])
            </div>
        @endforeach
    @endif
    @if (isset($obj->note) && $obj->note)
        <p><b>Notas:</b></p>
        @foreach ($obj->note as $note)
            <div class="element">
                @include('fhir.element.annotation',["obj"=>$note])
            </div>
        @endforeach
    @endif
    @if (isset($obj->condition) && $obj->condition)
        <p><b>Condición:</b></p>
        <div class="element">
            @foreach ($obj->condition as $condition)
                @if (isset($condition["code"]))
                    <p><b>Código:</b></p>
                    <div class="element">
                        @include('fhir.element.codeableConcept', ["obj"=>$condition["code"]])
                    </div>
                @endif
                @if (isset($condition["outcome"]))
                    <p><b>Consecuencia:</b></p>
                    <div class="element">
                        @include('fhir.element.codeableConcept', ["obj"=>$condition["outcome"]])
                    </div>
                @endif
                @if (isset($condition["contributedToDeath"]))
                    <p><b>¿Contribuyó con la muerte?</b> {{$condition["contributedToDeath"]?"SI":"NO"}}</p>
                @endif
                @if (isset($condition["onsetAge"]))
                    <p><b>Fecha:</b></p>
                    <div class="element">
                        @include('fhir.element.age', ["obj"=>$condition["onsetAge"]])
                    </div>
                @endif
                @if (isset($condition["onsetRange"]))
                    <p><b>Fecha:</b></p>
                    <div class="element">
                        @include('fhir.element.range', ["obj"=>$condition["onsetRange"]])
                    </div>
                @endif
                @if (isset($condition["onsetPeriod"]))
                    <p><b>Fecha:</b></p>
                    <div class="element">
                        @include('fhir.element.period', ["obj"=>$condition["onsetPeriod"]])
                    </div>
                @endif
                @if (isset($condition["onsetString"]))
                    <p><b>Fecha:</b></p>
                    <div class="element">
                        {{$condition["onsetString"]}}
                    </div>
                @endif
                @if (isset($condition["note"]))
                    <p><b>Notas:</b></p>
                    <div class="element">
                        @foreach ($condition["note"] as $note)
                            <div class="element">
                                @include('fhir.element.annotation', ["obj"=>$note])
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===END-ENCOUNTER===</b></div></div>
@endif