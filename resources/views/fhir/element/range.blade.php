<div class="row">
    <div class="col-xs-12">
        <b>===RANGE===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{
    // from Element: extension
    "low" : { Quantity(SimpleQuantity) }, // Low limit
    "high" : { Quantity(SimpleQuantity) } // High limit
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-RANGE===</b>
    </div>
</div>