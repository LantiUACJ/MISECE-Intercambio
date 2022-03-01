<div class="row">
    <div class="col-xs-12">
        <b>===SAMPLEDATA===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{
    // from Element: extension
    "origin" : { Quantity(SimpleQuantity) }, // R!  Zero value and units
    "period" : <decimal>, // R!  Number of milliseconds between samples
    "factor" : <decimal>, // Multiply data by this before adding to origin
    "lowerLimit" : <decimal>, // Lower limit of detection
    "upperLimit" : <decimal>, // Upper limit of detection
    "dimensions" : "<positiveInt>", // R!  Number of sample points at each time point
    "data" : "<string>" // Decimal values with spaces, or "E" | "U" | "L"
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-SAMPLEDATA===</b>
    </div>
</div>