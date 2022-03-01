<div class="row">
    <div class="col-xs-12">
        <b>===PERIOD===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->start))
    Inicio
    {{$obj->start}}
@endif
@if (isset($obj->end))
    Fin
    {{$obj->end}}
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-PERIOD===</b>
    </div>
</div>