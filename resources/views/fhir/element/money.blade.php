<div class="row">
    <div class="col-xs-12">
        <b>===MONEY===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{
    // from Element: extension
    "value" : <decimal>, // Numerical value (with implicit precision)
    "currency" : "<code>" // ISO 4217 Currency Code
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-MONEY===</b>
    </div>
</div>