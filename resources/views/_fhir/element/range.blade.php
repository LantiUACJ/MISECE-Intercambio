@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===RANGE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{
    // from Element: extension
    "low" : { Quantity(SimpleQuantity) }, // Low limit
    "high" : { Quantity(SimpleQuantity) } // High limit
}
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-RANGE===</b>
        </div>
    </div>
@endif