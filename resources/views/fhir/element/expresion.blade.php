<div class="row">
    <div class="col-xs-12">
        <b>===EXPRESION===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "description" : "<string>", // Natural language description of the condition
    "name" : "<id>", // Short name assigned to expression for reuse
    "language" : "<code>", // R!  text/cql | text/fhirpath | application/x-fhir-query | etc.
    "expression" : "<string>", // Expression in specified language
    "reference" : "<uri>" // Where the expression is found
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-EXPRESION===</b>
    </div>
</div>