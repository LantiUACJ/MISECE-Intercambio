@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===RATIO===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])


@if (isset($obj->numerator))
    @include('fhir.element.quantity',["obj"=>$obj->numerator])
@endif
@if (isset($obj->denominator))
    de @include('fhir.element.quantity',["obj"=>$obj->denominator])
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-RATIO===</b>
        </div>
    </div>
@endif