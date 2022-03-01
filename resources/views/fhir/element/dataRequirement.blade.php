<div class="row">
    <div class="col-xs-12">
        <b>===DATAREQUIREMENT===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "type" : "<code>", // R!  The type of the required data
    "profile" : [{ canonical(StructureDefinition) }], // The profile of the required data
    // subject[x]: E.g. Patient, Practitioner, RelatedPerson, Organization, Location, Device. One of these 2:
    "subjectCodeableConcept" : { CodeableConcept },
    "subjectReference" : { Reference(Group) },
    "mustSupport" : ["<string>"], // Indicates specific structure elements that are referenced by the knowledge module
    "codeFilter" : [{ // What codes are expected
        "path" : "<string>", // A code-valued attribute to filter on
        "searchParam" : "<string>", // A coded (token) parameter to search on
        "valueSet" : { canonical(ValueSet) }, // Valueset for the filter
        "code" : [{ Coding }] // What code is expected
    }],
    "dateFilter" : [{ // What dates/date ranges are expected
        "path" : "<string>", // A date-valued attribute to filter on
        "searchParam" : "<string>", // A date valued parameter to search on
        // value[x]: The value of the filter, as a Period, DateTime, or Duration value. One of these 3:
        "valueDateTime" : "<dateTime>"
        "valuePeriod" : { Period }
        "valueDuration" : { Duration }
    }],
    "limit" : "<positiveInt>", // Number of results
    "sort" : [{ // Order of the results
        "path" : "<string>", // R!  The name of the attribute to perform the sort
        "direction" : "<code>" // R!  ascending | descending
    }]
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-DATAREQUIREMENT===</b>
    </div>
</div>