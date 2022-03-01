<div class="row">
    <div class="col-xs-12">
        <b>===ANNOTATION===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->authorReference))
    
    Autor
    @include('fhir.element.reference',["obj"=>$obj->authorReference])

@endif
@if (isset($obj->authorString))
    
    Autor
    {{$obj->authorString}}
    
@endif
@if (isset($obj->time))
    
    Autor
    {{$obj->time}}
    
@endif
@if (isset($obj->text))
    
    Autor
    {{$obj->text}}

@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-ANNOTATION===</b>
    </div>
</div>