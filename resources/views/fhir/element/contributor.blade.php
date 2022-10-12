@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CONTRIBUTOR===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->value))
    {{str_replace(["author","editor","reviewer","endorser"],
                  ["author","editor","reviewer","endorser"],$obj->value)}}
@endif
@if (isset($obj->name))
    {{$obj->name}}
@endif
@if (isset($obj->contact))
    @include('fhir.element.contactDetail',["obj"=>$obj->contact])
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CONTRIBUTOR===</b>
        </div>
    </div>
@endif