@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CODING===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->system))
    <!--<div class="col s8">
        Sistema: {{$obj->system}}
    </div>-->
@endif
@if (isset($obj->version))
    <div class="col s4">
        Versión:
    </div>
    <div class="col s8">
        {{$obj->version}}
    </div>
@endif
@if (isset($obj->code) || isset($obj->display))
    <div class="col s8">
        @if (isset($obj->code))
            {{$obj->code}} 
        @endif
        @if (isset($obj->display))
            <b>{{$obj->display}}</b>
        @endif
    </div>
@endif
@if (isset($obj->userSelected))
    <div class="col s12">
        {{$obj->userSelected?"Fue":"NO fue"}} seleccionado por el usuario.
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CODING===</b>
        </div>
    </div>
@endif