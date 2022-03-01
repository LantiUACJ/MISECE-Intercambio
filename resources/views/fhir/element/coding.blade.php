<div class="row">
    <div class="col-xs-12">
        <b>===CODING===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->display))
    <div class="col-xs-12">
        <b>{{$obj->display}}</b>
    </div>
@endif
@if (isset($obj->system))
    <div class="col-xs-4">
        Sistema:
    </div>
    <div class="col-xs-8">
        {{$obj->system}}
    </div>
@endif
@if (isset($obj->version))
    <div class="col-xs-4">
        Versión:
    </div>
    <div class="col-xs-8">
        {{$obj->version}}
    </div>
@endif
@if (isset($obj->code))
    <div class="col-xs-4">
        Código:
    </div>
    <div class="col-xs-8">
        {{$obj->code}}
    </div>
@endif
@if (isset($obj->userSelected))
    <div class="col-xs-12">
        {{$obj->userSelected?"Fue":"NO fue"}} seleccionado por el usuario.
    </div>
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-CODING===</b>
    </div>
</div>