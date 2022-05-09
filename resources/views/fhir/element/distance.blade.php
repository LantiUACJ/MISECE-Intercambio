@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===DISTANCE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

    {{dd($obj)}}

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-DISTANCE===</b>
        </div>
    </div>
@endif