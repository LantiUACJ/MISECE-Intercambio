@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===condition===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col s12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col s6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->clinicalStatus))
    <div class="row">
        <div class="col s12">
            Estado clínico:
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->clinicalStatus])
        </div>
    </div>
@endif
@if (isset($obj->verificationStatus))
    <div class="row">
        <div class="col s12">
            Estado de verificación:
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->verificationStatus])
        </div>
    </div>
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col s12">
            Categoría
        </div>
        @foreach ($obj->category as $category)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$category])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->serverity))
    <div class="row">
        <div class="col s12">
            Severidad:
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->serverity])
        </div>
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col s12">
            Código
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
@if (isset($obj->bodySite))
    <div class="row">
        <div class="col s12">
            Categoría
        </div>
        @foreach ($obj->bodySite as $bodySite)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$bodySite])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Sujeto
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col s12">
            Encuentro:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->onsetDateTime))
    <div class="row">
        <div class="col s12">
            Fecha:
        </div>
        <div class="col s12">
            {{$obj->onsetDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->onsetAge))
    <div class="row">
        <div class="col s12">
            Fecha:
        </div>
        <div class="col s12">
            {{$obj->onsetAge}}
        </div>
    </div>
@endif
@if (isset($obj->onsetPeriod))
    <div class="row">
        <div class="col s12">
            Fecha:
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->onsetPeriod])
        </div>
    </div>
@endif
@if (isset($obj->onsetRange))
    <div class="row">
        <div class="col s12">
            Fecha:
        </div>
        <div class="col s12">
            @include('fhir.element.range',["obj"=>$obj->onsetRange])
        </div>
    </div>
@endif
@if (isset($obj->onsetString))
    <div class="row">
        <div class="col s12">
            Fecha:
        </div>
        <div class="col s12">
            {{$obj->onsetString}}
        </div>
    </div>
@endif
@if (isset($obj->abatementDateTime))
    <div class="row">
        <div class="col s12">
            Fecha de resolución:
        </div>
        <div class="col s12">
            {{$obj->abatementDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->abatementAge))
    <div class="row">
        <div class="col s12">
            Fecha de resolución:
        </div>
        <div class="col s12">
            @include('fhir.element.age',["obj"=>$obj->abatementAge])
        </div>
    </div>
@endif
@if (isset($obj->abatementPeriod))
    <div class="row">
        <div class="col s12">
            Fecha de resolución:
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->abatementPeriod])
        </div>
    </div>
@endif
@if (isset($obj->abatementRange))
    <div class="row">
        <div class="col s12">
            Fecha de resolución:
        </div>
        <div class="col s12">
            @include('fhir.element.range',["obj"=>$obj->abatementRange])
        </div>
    </div>
@endif
@if (isset($obj->abatementString))
    <div class="row">
        <div class="col s12">
            Fecha de resolución:
        </div>
        <div class="col s12">
            {{$obj->abatementString}}
        </div>
    </div>
@endif
@if (isset($obj->recordedDate))
    <div class="row">
        <div class="col s12">
            Fecha de registro:
        </div>
        <div class="col s12">
            {{$obj->recordedDate}}
        </div>
    </div>
@endif
@if (isset($obj->recorder))
    <div class="row">
        <div class="col s12">
            Registrador:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->recorder])
        </div>
    </div>
@endif
@if (isset($obj->asserter))
    <div class="row">
        <div class="col s12">
            Afirmador:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->asserter])
        </div>
    </div>
@endif
@if (isset($obj->stage))
    <div class="row">
        <div class="col s12">
            Etapa:
        </div>
        <div class="col s12">
            @foreach ($obj->stage as $stage)
                @if (isset($stage->summary))
                    <div class="row">
                        <div class="col s12">
                            Resumen:
                        </div>
                        <div class="col s12">
                            @include('fhir.element.codebaleConcept',["obj"=>$stage->summary])
                        </div>
                    </div>
                @endif
                @if (isset($stage->assessment))
                    <div class="row">
                        <div class="col s12">
                            Evaluación:
                        </div>
                        @foreach ($stage->assessment as $assessment)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$assessment])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($stage->type))
                    <div class="row">
                        <div class="col s12">
                            Tipo:
                        </div>
                        <div class="col s12">
                            @include('fhir.element.codebaleConcept',["obj"=>$stage->type])
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->evidence))
    <div class="row">
        <div class="col s12">
            Etapa:
        </div>
        <div class="col s12">
            @foreach ($obj->evidence as $evidence)
                @if (isset($evidence->code))
                    <div class="row">
                        <div class="col s12">
                            Evaluación:
                        </div>
                        @foreach ($evidence->code as $code)
                            <div class="col s12">
                                @include('fhir.element.codebaleConcept',["obj"=>$code])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($evidence->detail))
                    <div class="row">
                        <div class="col s12">
                            Detalle:
                        </div>
                        @foreach ($evidence->detail as $detail)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$detail])
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->note))
    <div class="row">
        <div class="col s12">
            Nota:
        </div>
        @foreach ($obj->note as $note)
            <div class="col s6">
                @include('fhir.element.annotation',["obj"=>$note])
            </div>
        @endforeach
    </div>    
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===condition===</b>
        </div>
    </div>
@endif