@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===USAGECONTEXT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if ($obj->code)
    <p><b>Código: </b>
        @include('fhir.element.coding', ["obj"=>$obj->code])
    </p>
@endif
@if ($obj->valueCodeableConcept)
    <p><b>Valor: </b>
        @include('fhir.element.codeableConcept', ["obj"=>$obj->code])
    </p>
@endif
@if ($obj->valueQuantity)
    <p><b>Valor: </b>
        @include('fhir.element.quantity', ["obj"=>$obj->valueQuantity])
    </p>
@endif
@if ($obj->valueRange)
    <p><b>Valor: </b>
        @include('fhir.element.range', ["obj"=>$obj->valueRange])
    </p>
@endif
@if ($obj->valueReference)
    <p><b>Valor: </b>
        @include('fhir.element.reference', ["obj"=>$obj->valueReference])
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-USAGECONTEXT===</b>
        </div>
    </div>
@endif