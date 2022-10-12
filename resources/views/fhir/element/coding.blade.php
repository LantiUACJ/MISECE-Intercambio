@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CODING===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->system) && env("TEST", false))
    Sistema: {{$obj->system}}
@endif
@if (isset($obj->version) && env("TEST", false))
    Versión: {{$obj->version}}
@endif
@if (isset($obj->code))
    {{$obj->code}}
@endif
@if (isset($obj->display))
    <b>{{$obj->display}}</b>
@endif
@if (isset($obj->userSelected))
    {{$obj->userSelected?"Fue":"NO fue"}} seleccionado por el usuario.
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CODING===</b>
        </div>
    </div>
@endif