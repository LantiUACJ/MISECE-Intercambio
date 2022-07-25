@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===DIAGNOSTICREPORT===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador:</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->basedOn) && $obj->basedOn)
    <p><b>Basado en</b></p>
    @foreach ($obj->basedOn as $basedOn)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$basedOn])
        </div>
    @endforeach
@endif
@if (isset($obj->status))
    <p><b>Estado:</b>
        {{ str_replace(["registered", "partial","preliminary","final"],["Registrado","Parcial", "Preliminar", "Final"], strtolower($obj->status))}}
    </p>
@endif
@if (isset($obj->category) && $obj->category)
    <p><b>Categoría:</b></p>
    @foreach ($obj->category as $category)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$category])
        </div>
    @endforeach
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
@if (isset($obj->effectiveDateTime))
    <p><b>Fecha y hora de vigencia:</b></p>
    <div class="element">
        {{$obj->effectiveDateTime}}
    </div>
@endif
@if (isset($obj->effectivePeriod))
    <p><b>Periodo de vigencia:</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->effectivePeriod])
    </div>
@endif
@if (isset($obj->issued))
    <p><b>Emitida:</b></p>
    <div class="element">
        {{$obj->issued}}
    </div>
@endif
@if (isset($obj->performer) && $obj->performer)
    <p><b>Ejecutor:</b></p>
    @foreach ($obj->performer as $performer)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$performer])    
        </div>
    @endforeach
@endif
@if (isset($obj->resultsInterpreter) && $obj->resultsInterpreter)
    <p><b>Interprete de resultado:</b></p>
    @foreach ($obj->resultsInterpreter as $resultsInterpreter)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$resultsInterpreter])    
        </div>
    @endforeach
@endif
@if (isset($obj->specimen) && $obj->specimen)
    <p><b>Especimen:</b></p>
    @foreach ($obj->specimen as $specimen)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$specimen])
        </div>
    @endforeach
@endif
@if (isset($obj->result) && $obj->result)
    <p><b>Resultado:</b></p>
    @foreach ($obj->result as $result)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$result])
        </div>
    @endforeach
@endif
@if (isset($obj->imagingStudy) && $obj->imagingStudy)
    <p><b>Estudio de imagen:</b></p>
    @foreach ($obj->imagingStudy as $imagingStudy)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$imagingStudy])
        </div>
    @endforeach
@endif
@if (isset($obj->media) && $obj->media)
    <p><b>Media:</b></p>
    @foreach ($obj->media as $media)
        @if ($media->comment)
            <p><b>Comentario:</b></p>
            <div class="element">
                {{$media->comment}}
            </div>
        @endif
        @if ($media->link)
            <p><b>Enlace:</b></p>
            <div class="element">
                @include('fhir.element.reference',["obj"=>$media->link])
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->conclusion))
    <p><b>Conclusión:</b></p>
    <div class="element">
        @if (strpos($obj->conclusion, "→")!== false)
        {!! str_replace("→","<a href=''>", explode("<<", $obj->conclusion)[0]) !!}
            @foreach ($obj->ConceptosSNOMED as $item)
                    @if (isset($item->id) && $item->id == str_replace(">>", "", explode("<<", $obj->conclusion)[1]))
                        {{$item->id}}
                    @endif
                @endforeach
            </a>
        @else
            {{$obj->conclusion}}
        @endif
    </div>
@endif
@if (isset($obj->conclusionCode) && $obj->conclusionCode)
    <p><b>Código de conclusión:</b></p>
    @foreach ($obj->conclusionCode as $conclusionCode)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$conclusionCode])
        </div>
    @endforeach
@endif
@if (isset($obj->presentedForm) && $obj->presentedForm)
    <p><b>Formulario presentado</b></p>
    @foreach ($obj->presentedForm as $presentedForm)
        <div class="element">
            @include('fhir.element.attachment',["obj"=>$presentedForm])
        </div>
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-DIAGNOSTICREPORT===</b>
        </div>
    </div>
@endif