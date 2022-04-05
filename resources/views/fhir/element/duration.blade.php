@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===DURATION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@include('fhir.element.quantity',["obj"=>$obj])

@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-DURATION===</b>
        </div>
    </div>
@endif