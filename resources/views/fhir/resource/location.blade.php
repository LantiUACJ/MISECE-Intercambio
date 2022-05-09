@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col s12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col s6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["active", "suspended","inactive"],
                                   ["active", "suspended","inactive"], strtolower($obj->status))}}
        </div>
    </div>
@endif
"operationalStatus" : { Coding }, // The operational status of the location (typically only for a bed/room)
"name" : "<string>", // Name of the location as used by humans
"alias" : ["<string>"], // A list of alternate names that the location is known as, or was known as, in the past
"description" : "<string>", // Additional details about the location that could be displayed as further information to identify the location beyond its name
"mode" : "<code>", // instance | kind
"type" : [{ CodeableConcept }], // Type of function performed
"telecom" : [{ ContactPoint }], // Contact details of the location
"address" : { Address }, // Physical location
"physicalType" : { CodeableConcept }, // Physical form of the location
"position" : { // The absolute geographic location
    "longitude" : <decimal>, // R!  Longitude with WGS84 datum
    "latitude" : <decimal>, // R!  Latitude with WGS84 datum
    "altitude" : <decimal> // Altitude with WGS84 datum
},
"managingOrganization" : { Reference(Organization) }, // Organization responsible for provisioning and upkeep
"partOf" : { Reference(Location) }, // Another Location this one is physically a part of
"hoursOfOperation" : [{ // What days/times during a week is this location usually open
    "daysOfWeek" : ["<code>"], // mon | tue | wed | thu | fri | sat | sun
    "allDay" : <boolean>, // The Location is open all day
    "openingTime" : "<time>", // Time that the Location opens
    "closingTime" : "<time>" // Time that the Location closes
}],
"availabilityExceptions" : "<string>", // Description of availability exceptions
"endpoint" : [{ Reference(Endpoint) }] // Technical endpoints providing access to services operated for the location
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
        </div>
    </div>
@endif