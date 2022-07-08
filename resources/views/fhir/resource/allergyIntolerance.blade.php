@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===AllergyIntolerance===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
<div class="element">
    @if (isset($obj->clinicalStatus))
        <p><b>Estado Clínico:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->clinicalStatus])
        </p>
    @endif
    @if (isset($obj->verificationStatus))
        <p><b>Estado de verificación:</b>
            @include('fhir.element.codeableConcept',["obj"=>$obj->verificationStatus])
        </p>
    @endif
    @if (isset($obj->type))
        Tipo: {{str_replace(["allergy","intolerance"], ["Alergia","Intolerancia"], $obj->type)}}
    @endif
    @if (isset($obj->category))
        <p><b>Categoría(s):</b>
        @foreach ($obj->category as $category)
            {{str_replace(["food","medication","environment","biologic"], ["Comida","Medicación","Ambiente","Biológico"], $category)}}
        @endforeach
    @endif
    @if (isset($obj->criticality))
        <p>Criticidad: {{str_replace(["low","high", "unable-to-assess"], ["Baja","Alta","Incapaz de evaluar"], $obj->criticality)}}</p>
    @endif
    @if (isset($obj->code))
        <p><b>Alergia/Intolerancia:</b> @include('fhir.element.codeableConcept',["obj"=>$obj->code])</p>
    @endif
    @if (isset($obj->patient))
        <p><b>Paciente:</b> @include('fhir.element.reference',["obj"=>$obj->patient])</p>
    @endif
    @if (isset($obj->encounter))
        <p><b>Visita:</b> @include('fhir.element.reference',["obj"=>$obj->encounter])</p>
    @endif
    @if (isset($obj->onsetDateTime) || isset($obj->onsetAge) || isset($obj->onsetPeriod) || isset($obj->onsetRange) || isset($obj->onsetString))
        <p><b>Fecha de identificación:</b>
        @if (isset($obj->onsetDateTime))
            {{$obj->onsetDateTime}}
        @endif
        @if (isset($obj->onsetAge))
            @include('fhir.element.age',["obj"=>$obj->onsetAge])
        @endif
        @if (isset($obj->onsetPeriod))
            @include('fhir.element.period',["obj"=>$obj->onsetPeriod])
        @endif
        @if (isset($obj->onsetRange))
            @include('fhir.element.range',["obj"=>$obj->onsetRange])
        @endif
        @if (isset($obj->onsetString))
            {{$obj->onsetString}}
        @endif
        </p>
    @endif

    @if (isset($obj->recordedDate))
        <p><b>Fecha de registro:</b> {{$obj->recordedDate}}</p>
    @endif
    @if (isset($obj->recorder))
        <p><b>Archivista:</b> @include('fhir.element.reference',["obj"=>$obj->recorder])</p>
    @endif
    @if (isset($obj->asserter))
        <p><b>Fuente:</b> @include('fhir.element.reference',["obj"=>$obj->asserter])</p>
    @endif
    @if (isset($obj->lastOccurrence))
        <p><b>Fecha de última ocurrencia:</b> {{$obj->lastOccurrence}}</p>
    @endif
    @if (isset($obj->note))
        <p><b>Nota:</b></p>
        <div class="element">
            @foreach ($obj->note as $note)
                @include('fhir.element.annotation',["obj"=>$note])
            @endforeach
        </div>
    @endif

    @if (isset($obj->reaction))
        <p><b>Reacción(es):</b></p>
        <div class="element">
            @foreach ($obj->reaction as $reaction)
                <hr>
                @if (isset($reaction->substance))
                    <p><b>Substancia:</b>
                        @include('fhir.element.codeableConcept',["obj"=>$reaction->substance])
                    </p>
                @endif
                @if (isset($reaction->manifestation))
                    <p><b>Síntomas/signos clínicos:</b></p>
                    <div class="element">
                        @foreach ($reaction->manifestation as $manifestation)
                            * @include('fhir.element.codeableConcept',["obj"=>$manifestation])
                        @endforeach
                    </div>
                @endif
                @if (isset($reaction->description))
                    <p><b>Descripción:</b> {{$reaction->description}}</p>
                @endif
                @if (isset($reaction->onset))
                    <p><b>Fecha en que se manifestó:</b> {{$reaction->onset}}</p>
                @endif
                @if (isset($reaction->serverity))
                    <p><b>Criticidad: </b>{{str_replace(["mild", "moderate", "severe"], ["Leve", "moderada", "severa"], $reaction->serverity)}}</p>
                @endif
                @if (isset($reaction->exposureRoute))
                    <p><b>Ruta de exposición:</b>
                        @include('fhir.element.codeableConcept',["obj"=>$reaction->exposureRoute])
                    </p>
                @endif
                @if (isset($reaction->note))
                    <p><b>Nota:</b></p>
                    <div class="element">
                        @foreach ($reaction->note as $note)
                            @include('fhir.element.annotation',["obj"=>$note])
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    @if (isset($obj->identifier))
        <p><b>Identificador(es):</b></p>
        <div class="element">
            @foreach ($obj->identifier as $identifier)
                <p>@include('fhir.element.identifier',["obj"=>$identifier])</p>
            @endforeach
        </div>
    @endif
</div>
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===AllergyIntolerance===</b>
        </div>
    </div>
@endif