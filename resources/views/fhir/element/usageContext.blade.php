@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===USAGECONTEXT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "code" : { Coding }, // R!  Type of context being specified
    // value[x]: Value that defines the context. One of these 4:
    "valueCodeableConcept" : { CodeableConcept }
    "valueQuantity" : { Quantity }
    "valueRange" : { Range }
    "valueReference" : { Reference(PlanDefinition|ResearchStudy|InsurancePlan|
     HealthcareService|Group|Location|Organization) }
}
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-USAGECONTEXT===</b>
        </div>
    </div>
@endif