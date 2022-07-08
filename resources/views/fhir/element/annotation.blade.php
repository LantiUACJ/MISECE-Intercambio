@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===ANNOTATION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->authorReference))
    [@include('fhir.element.reference',["obj"=>$obj->authorReference])]
@endif
@if (isset($obj->authorString))
    <b>[{{$obj->authorString}}]</b>
@endif
@if (isset($obj->time)) 
    {{$obj->time}}
@endif
@if (isset($obj->text))
    {{$obj->text}}
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-ANNOTATION===</b>
        </div>
    </div>
@endif