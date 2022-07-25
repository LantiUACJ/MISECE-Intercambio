@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===condition===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->clinicalStatus))
    <p><b>Estado clínico:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->clinicalStatus])
    </p>
@endif
@if (isset($obj->verificationStatus))
    <p><b>Estado de verificación:</b> @include('fhir.element.codeableConcept',["obj"=>$obj->verificationStatus])</p>
@endif
@if (isset($obj->category) && $obj->category)
    <p><b>Categoría:</b></p>
    <div class="element">
        @foreach ($obj->category as $category)
            * @include('fhir.element.codeableConcept',["obj"=>$category])
        @endforeach
    </div>
@endif
@if (isset($obj->serverity))
    <p><b>Severidad:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->serverity])
    </p>
@endif
@if (isset($obj->code))
    <p><b>Código:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </p>
@endif
@if (isset($obj->bodySite) && $obj->bodySite)
    <p><b>Categoría:</b></p>
    <div class="element">
        @foreach ($obj->bodySite as $bodySite)
            * @include('fhir.element.codeableConcept',["obj"=>$bodySite])
        @endforeach
    </div>
@endif
@if (isset($obj->subject))
    <p><b>Sujeto:</b> @include('fhir.element.reference',["obj"=>$obj->subject])</p>
@endif
@if (isset($obj->encounter))
    <p><b>Encuentro:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->encounter])
    </div>
@endif
@if (isset($obj->onsetDateTime))
    <p><b>Fecha:</b>
        {{$obj->onsetDateTime}}
    </p>
@endif
@if (isset($obj->onsetAge))
    <p><b>Fecha:</b></p>
    <div class="element">
        @include('fhir.element.quantity', ["obj"=>$obj->onsetAge])
    </div>
@endif
@if (isset($obj->onsetPeriod))
    <p><b>Fecha:</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->onsetPeriod])
    </div>
@endif
@if (isset($obj->onsetRange))
    <p><b>Fecha:</b></p>
    <div class="element">
        @include('fhir.element.range',["obj"=>$obj->onsetRange])
    </div>
@endif
@if (isset($obj->onsetString))
    <p><b>Fecha:</b></p>
    <div class="element">
        {{$obj->onsetString}}
    </div>
@endif
@if (isset($obj->abatementDateTime))
    <p><b>Fecha de resolución:</b></p>
    <div class="element">
        {{$obj->abatementDateTime}}
    </div>
@endif
@if (isset($obj->abatementAge))
    <p><b>Fecha de resolución:</b></p>
    <div class="element">
        @include('fhir.element.quantity',["obj"=>$obj->abatementAge])
    </div>
@endif
@if (isset($obj->abatementPeriod))
    <p><b>Fecha de resolución:</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->abatementPeriod])
    </div>
@endif
@if (isset($obj->abatementRange))
    <p><b>Fecha de resolución:</b></p>
    <div class="element">
        @include('fhir.element.range',["obj"=>$obj->abatementRange])
    </div>
@endif
@if (isset($obj->abatementString))
    <p><b>Fecha de resolución:</b></p>
    <div class="element">
        {{$obj->abatementString}}
    </div>
@endif
@if (isset($obj->recordedDate))
    <p><b>Fecha de registro:</b></p>
    <div class="element">
        {{$obj->recordedDate}}
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
@if (isset($obj->stage) && $obj->stage)
    <p><b>Etapa:</b></p>
    <div class="element">
        @foreach ($obj->stage as $stage)
            @if (isset($stage->summary))
                <p><b>Resumen:</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$stage->summary])
                </div>
            @endif
            @if (isset($stage->assessment) && $stage->assessment)
                <p><b>Evaluación:</b></p>
                <div class="element">
                    @foreach ($stage->assessment as $assessment)
                        @include('fhir.element.reference',["obj"=>$assessment])
                    @endforeach
                </div>
            @endif
            @if (isset($stage->type))
                <p><b>Tipo:</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$stage->type])
                </div>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->evidence) && $obj->evidence)
    <p><b>Etapa:</b></p>
    <div class="element">
        @foreach ($obj->evidence as $evidence)
            @if (isset($evidence->code) && $evidence->code)
                <p><b>Evaluación:</b></p>
                @foreach ($evidence->code as $code)
                    <div class="element">
                        @include('fhir.element.codeableConcept',["obj"=>$code])
                    </div>
                @endforeach
            @endif
            @if (isset($evidence->detail) && $evidence->detail)
                <p><b>Detalle:</b></p>
                @foreach ($evidence->detail as $detail)
                    <div class="element">
                        @include('fhir.element.reference',["obj"=>$detail])
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->note) && $obj->note)
    <p><b>Nota:</b></p>
    @foreach ($obj->note as $note)
        <div class="element">
            @include('fhir.element.annotation',["obj"=>$note])
        </div>
    @endforeach
@endif
@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador:</b></p>
    <div class="element">
        @foreach ($obj->identifier as $identifier)
            @include('fhir.element.identifier',["obj"=>$identifier])
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===condition===</b>
        </div>
    </div>
@endif