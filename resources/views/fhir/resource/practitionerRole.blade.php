@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===AllergyIntolerance===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>    
@endif
    "active" : <boolean>, // Whether this practitioner role record is in active use
    "period" : { Period }, // The period during which the practitioner is authorized to perform in these role(s)
    "practitioner" : { Reference(Practitioner) }, // Practitioner that is able to provide the defined services for the organization
    "organization" : { Reference(Organization) }, // Organization where the roles are available
    "code" : [{ CodeableConcept }], // Roles which this practitioner may perform
    "specialty" : [{ CodeableConcept }], // Specific specialty of the practitioner
    "location" : [{ Reference(Location) }], // The location(s) at which this practitioner provides care
    "healthcareService" : [{ Reference(HealthcareService) }], // The list of healthcare services that this worker provides for this role's Organization/Location(s)
    "telecom" : [{ ContactPoint }], // Contact details that are specific to the role/location/service
    "availableTime" : [{ // Times the Service Site is available
        "daysOfWeek" : ["<code>"], // mon | tue | wed | thu | fri | sat | sun
        "allDay" : <boolean>, // Always available? e.g. 24 hour service
        "availableStartTime" : "<time>", // Opening time of day (ignored if allDay = true)
        "availableEndTime" : "<time>" // Closing time of day (ignored if allDay = true)
    }],
    "notAvailable" : [{ // Not available during this time due to provided reason
        "description" : "<string>", // R!  Reason presented to the user explaining why time not available
        "during" : { Period } // Service not available from this date
    }],
    "availabilityExceptions" : "<string>", // Description of availability exceptions
    "endpoint" : [{ Reference(Endpoint) }] // Technical endpoints providing access to services operated for the practitioner with this role
}