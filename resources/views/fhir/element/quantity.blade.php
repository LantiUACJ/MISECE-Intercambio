@if (env("TEST", false))
    <div class="col s12">
        <b>===QUANTITY===</b>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->comparator))
    {{$obj->comparator}}
@endif
@if (isset($obj->value))
    {{$obj->value}}
@endif
@if (isset($obj->unit))
    {{$obj->unit}}
@endif
@if (isset($obj->code))
    {{$obj->code}}
@endif
@if (isset($obj->system))
    <!--<div class="col s5">
        sistema: {{$obj->system}}
    </div>-->
@endif
@if (env("TEST", false))
    <div class="col s12">
        <b>===END-QUANTITY===</b>
    </div>
@endif