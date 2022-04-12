@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===PERIOD===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->start))
    Inicio
    {{$obj->start}}
@endif
@if (isset($obj->end))
    Fin
    {{$obj->end}}
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-PERIOD===</b>
        </div>
    </div>
@endif