<div class="row">
    @if (env("TEST", false))
        <div class="col-12">
            <b>===QUANTITY===</b>
        </div>
    @endif
    @include('fhir.element.element',["obj"=>$obj])

    @if (isset($obj->value))
        <div class="col-1">
            {{$obj->value}}
        </div>
    @endif
    @if (isset($obj->comparator))
        <div class="col-1">
            {{$obj->comparator}}
        </div>
    @endif
    @if (isset($obj->unit))
        <div class="col-2">
            {{$obj->unit}}
        </div>
    @endif
    @if (isset($obj->system))
        <!--<div class="col-5">
            sistema: {{$obj->system}}
        </div>-->
    @endif
    @if (isset($obj->code))
        <div class="col-3">
            código: {{$obj->code}}
        </div>
    @endif
    
    @if (env("TEST", false))
        <div class="col-12">
            <b>===END-QUANTITY===</b>
        </div>
    @endif
</div>