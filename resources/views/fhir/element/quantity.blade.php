<div class="row">
    <div class="col-xs-12">
        <b>===QUANTITY===</b>
    </div>
    
    @include('fhir.element.element',["obj"=>$obj])

    @if (isset($obj->value))
        <div class="col-xs-1">
            {{$obj->value}}
        </div>
    @endif
    @if (isset($obj->comparator))
        <div class="col-xs-1">
            {{$obj->comparator}}
        </div>
    @endif
    @if (isset($obj->unit))
        <div class="col-xs-2">
            {{$obj->unit}}
        </div>
    @endif
    @if (isset($obj->system))
        <div class="col-xs-5">
            sistema: {{$obj->system}}
        </div>
    @endif
    @if (isset($obj->code))
        <div class="col-xs-3">
            código: {{$obj->code}}
        </div>
    @endif

    <div class="col-xs-12">
        <b>===END-QUANTITY===</b>
    </div>
</div>