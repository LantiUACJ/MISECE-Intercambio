@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===DIAGNOSTICREPORT===</b>
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
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col s12">
            Basado en
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["registered", "partial","preliminary","final"],["Registrado","Parcial", "Preliminar", "Final"], strtolower($obj->status))}}
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
            Visita
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->effectiveDateTime))
    <div class="row">
        <div class="col s12">
            Fecha y hora de vigencia
        </div>
        <div class="col s12">
            {{$obj->effectiveDateTime}}
        </div>
    </div>
@endif
@if (isset($obj->effectivePeriod))
    <div class="row">
        <div class="col s12">
            Periodo de vigencia
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
        </div>
    </div>
@endif
@if (isset($obj->issued))
    <div class="row">
        <div class="col s12">
            Emitida
        </div>
        <div class="col s12">
            {{$obj->issued}}
        </div>
    </div>
@endif
@if (isset($obj->performer))
    <div class="row">
        <div class="col s12">
            Ejecutor
        </div>
        @foreach ($obj->performer as $performer)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$performer])    
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->resultsInterpreter))
    <div class="row">
        <div class="col s12">
            Interprete de resultado
        </div>
        @foreach ($obj->resultsInterpreter as $resultsInterpreter)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$resultsInterpreter])    
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->specimen))
    <div class="row">
        <div class="col s12">
            Especimen
        </div>
        @foreach ($obj->specimen as $specimen)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$specimen])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->result))
    <div class="row">
        <div class="col s12">
            Resultado
        </div>
        @foreach ($obj->result as $result)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$result])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->imagingStudy))
    <div class="row">
        <div class="col s12">
            Estudio de imagen
        </div>
        @foreach ($obj->imagingStudy as $imagingStudy)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$imagingStudy])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->media))
    <div class="row">
        <div class="col s12">
            Comentario
        </div>
        @foreach ($obj->media as $media)
            <div class="col s6">
                {{$media->comment}}
            </div>
        
    </div>    
        Enlace
        @include('fhir.element.reference',["obj"=>$media->link])
    
    @endforeach
@endif
@if (isset($obj->conclusion))
    <div class="row">
        <div class="col s12">
            Conclusión
        </div>
        <div class="col s12">
            {{$obj->conclusion}}
        </div>
    </div>
@endif
@if (isset($obj->conclusionCode))
    <div class="row">
        <div class="col s12">
            Categoría
        </div>
        @foreach ($obj->conclusionCode as $conclusionCode)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$conclusionCode])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->presentedForm))
    <div class="row">
        <div class="col s12">
            Formulario presentado
        </div>
        @foreach ($obj->presentedForm as $presentedForm)
            <div class="col s6">
                @include('fhir.element.attachment',["obj"=>$presentedForm])
            </div>
        @endforeach
    </div>    
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-DIAGNOSTICREPORT===</b>
        </div>
    </div>
@endif