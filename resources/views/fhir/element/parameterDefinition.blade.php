@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===PARAMETERDEFINITION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "name" : "<code>", // Name used to access the parameter value
    "use" : "<code>", // R!  in | out
    "min" : <integer>, // Minimum cardinality
    "max" : "<string>", // Maximum cardinality (a number of *)
    "documentation" : "<string>", // A brief description of the parameter
    "type" : "<code>", // R!  What type of value
    "profile" : { canonical(StructureDefinition) } // What profile the value is expected to be
}
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-PARAMETERDEFINITION===</b>
        </div>
    </div>
@endif