@if (isset($obj->title))
    <p><b>Título:</b> {{$obj->title}}</p>
@endif
@if (isset($obj->code))
    <p><b>Código:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </p>
@endif
@if (isset($obj->author) && $obj->author)
    <p><b>Autor:</b></p>
    <div class="element">
        @foreach ($obj->author as $author)
            * @include('fhir.element.reference',["obj"=>$author]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->focus))
    <p><b>Enfoque:</b>
        @include('fhir.element.reference',["obj"=>$obj->focus])
    </p>
@endif
@if (isset($obj->text))
    <p><b>Texto:</b>
        @include('fhir.element.narrative',["obj"=>$obj->text])
    </p>
@endif
@if (isset($obj->mode))
    <p><b>Modo:</b>
        {{str_replace(["working","snapshot","changes"],["Trabajado","Vista previa","Cambios"],$obj->mode)}} <!-- working | snapshot | changes-->
    </p>
@endif
@if (isset($obj->orderedBy))
    <p><b>Ordenados por:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->orderedBy])
    </p>
@endif
@if (isset($obj->entry) && $obj->entry)
    <p><b>Entrada:</b></p>
    <div class="element">
        @foreach ($obj->entry as $entry)
            * @include('fhir.element.reference',["obj"=>$entry]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->emptyReason))
    <p><b>Razón por la sección vacía:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->emptyReason])
    </p>
@endif
@if (isset($obj->section) && $obj->section)
    <p><b>Sección:</b></p>
    <div class="element">
        @foreach ($obj->section as $subSection)
            @include('fhir.element.compositionSection',["obj"=>$subSection, "key"=>$key+1])
        @endforeach
    </div>
@endif