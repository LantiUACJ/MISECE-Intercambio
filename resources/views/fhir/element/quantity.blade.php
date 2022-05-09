<div class="row">
    @if (env("TEST", false))
        <div class="col s12">
            <b>===QUANTITY===</b>
        </div>
    @endif
    @include('fhir.element.element',["obj"=>$obj])

    @if (isset($obj->value))
        <div class="col s1">
            {{$obj->value}}
        </div>
    @endif
    @if (isset($obj->comparator))
        <div class="col s1">
            {{$obj->comparator}}
        </div>
    @endif
    @if (isset($obj->unit))
        <div class="col s2">
            {{$obj->unit}}
        </div>
    @endif
    @if (isset($obj->system))
        <!--<div class="col s5">
            sistema: {{$obj->system}}
        </div>-->
    @endif
    @if (isset($obj->code))
        <div class="col s3">
            código: {{$obj->code}}
        </div>
    @endif
    
    @if (env("TEST", false))
        <div class="col s12">
            <b>===END-QUANTITY===</b>
        </div>
    @endif
</div>