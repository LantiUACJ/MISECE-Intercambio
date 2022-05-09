@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===AllergyIntolerance===</b>
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
            Estado Clínico
        </div>
        <div class="col s6">
            @include('fhir.element.codeableConcept',["obj"=>$obj->clinicalStatus])
        </div>
    </div>    
@endif
@if (isset($obj->verificationStatus))
    <div class="row">
        <div class="col s12">
            Estado de verificación
        </div>
        <div class="col s6">
            @include('fhir.element.codeableConcept',["obj"=>$obj->verificationStatus])
        </div>
    </div>    
@endif
@if (isset($obj->type))
    <div class="row">
        <div class="col s12">
            Tipo
        </div>
        <div class="col s6">
            {{str_replace(["allergy","intolerance"], ["allergy","intolerance"], $obj->type)}}
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
                {{str_replace(["food","medication","environment","biologic"], ["food","medication","environment","biologic"], $category)}}
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->criticality))
    <div class="row">
        <div class="col s12">
            Criticidad
        </div>
        <div class="col s6">
            {{str_replace(["low","high", "unable-to-assess"], ["low","high","unable-to-assess"], $obj->criticality)}}
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
@if (isset($obj->patient))
    <div class="row">
        <div class="col s12">
            Paciente:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->patient])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col s12">
            Visita
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->onsetDateTime))
    <div class="row">
        <div class="col s12">
            Fecha de identificación <br>
            {{$obj->onsetDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->onsetAge))
    <div class="row">
        <div class="col s12">
            Año de identificación <br>
            @include('fhir.element.age',["obj"=>$obj->onsetAge])
        </div>
    </div>
@endif
@if (isset($obj->onsetPeriod))
    <div class="row">
        <div class="col s12">
            Fecha de identificación <br>
            @include('fhir.element.period',["obj"=>$obj->onsetPeriod])
        </div>
    </div>
@endif
@if (isset($obj->onsetRange))
    <div class="row">
        <div class="col s12">
            Fecha de identificación <br>
            @include('fhir.element.range',["obj"=>$obj->onsetRange])
        </div>
    </div>
@endif
@if (isset($obj->onsetString))
    <div class="row">
        <div class="col s12">
            Fecha de identificación <br>
            {{$obj->onsetString}}
        </div>
    </div>
@endif
@if (isset($obj->recordedDate))
    <div class="row">
        <div class="col s12">
            Fecha de registro <br>
            {{$obj->recordedDate}}
        </div>
    </div>
@endif
@if (isset($obj->recorder))
    <div class="row">
        <div class="col s12">
            Archivista:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->recorder])
        </div>
    </div>
@endif
@if (isset($obj->asserter))
    <div class="row">
        <div class="col s12">
            Fuente:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->asserter])
        </div>
    </div>
@endif
@if (isset($obj->lastOccurrence))
    <div class="row">
        <div class="col s12">
            Fecha de última ocurrencia: <br>
            {{$obj->lastOccurrence}}
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

@if (isset($obj->reaction))
    <div class="row">
        <div class="col s12">
            Reacción:
            @foreach ($obj->reaction as $reaction)
                @if (isset($reaction->substance))
                    <div class="row">
                        <div class="col s12">
                            Substancia
                        </div>
                        <div class="col s12">
                            @include('fhir.element.codeableConcept',["obj"=>$reaction->substance])
                        </div>
                    </div>
                @endif
                @if (isset($reaction->manifestation))
                    <div class="row">
                        <div class="col s12">
                            Código usado:
                        </div>
                        @foreach ($reaction->manifestation as $manifestation)
                            <div class="col s6">
                                @include('fhir.element.codeableConcept',["obj"=>$manifestation])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($obj->description))
                    <div class="row">
                        <div class="col s12">
                            Descripción <br>
                            {{$obj->description}}
                        </div>
                    </div>
                @endif
                @if (isset($obj->onset))
                    <div class="row">
                        <div class="col s12">
                            Fecha en que se manifestó <br>
                            {{$obj->onset}}
                        </div>
                    </div>
                @endif
                @if (isset($obj->criticality))
                    <div class="row">
                        <div class="col s12">
                            Criticidad
                        </div>
                        <div class="col s6">
                            {{str_replace(["mild","moderate", "severe"], ["mild","moderate","severe"], $obj->criticality)}}
                        </div>
                    </div>    
                @endif
                @if (isset($reaction->exposureRoute))
                    <div class="row">
                        <div class="col s12">
                            Ruta de exposición
                        </div>
                        <div class="col s12">
                            @include('fhir.element.codeableConcept',["obj"=>$reaction->exposureRoute])
                        </div>
                    </div>
                @endif
                @if (isset($reaction->note))
                    <div class="row">
                        <div class="col s12">
                            Nota:
                        </div>
                        @foreach ($reaction->note as $note)
                            <div class="col s6">
                                @include('fhir.element.annotation',["obj"=>$note])
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===AllergyIntolerance===</b>
        </div>
    </div>
@endif