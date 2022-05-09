@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===practitionerRole===</b>
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
@if (isset($obj->active))
    <div class="row">
        <div class="col s12">
            Activo
        </div>
        <div class="col s12">
            {{$obj->active?"SI":"NO"}}
        </div>
    </div>
@endif
@if (isset($obj->period))
    <div class="row">
        <div class="col s12">
            Período
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->period])
        </div>
    </div>
@endif
"practitioner" : { Reference(Practitioner) }, // Practitioner that is able to provide the defined services for the organization
"organization" : { Reference(Organization) }, // Organization where the roles are available
@if (isset($obj->code))
    <div class="row">
        <div class="col s12">
            Código
        </div>
        @foreach ($obj->code as $code)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$code])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->specialty))
    <div class="row">
        <div class="col s12">
            Especialidad:
        </div>
        @foreach ($obj->specialty as $specialty)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$specialty])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->location))
    <div class="row">
        <div class="col s12">
            Lugar
        </div>
        @foreach ($obj->location as $location)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$location])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->healthcareService))
    <div class="row">
        <div class="col s12">
            Servicio medico:
        </div>
        @foreach ($obj->healthcareService as $healthcareService)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$healthcareService])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->telecom))
    <div class="row">
        <div class="col s12">
            Contacto:
        </div>
        @foreach ($obj->telecom as $telecom)
            <div class="col s6">
                @include('fhir.element.contactPoint',["obj"=>$telecom])
            </div>
        @endforeach
    </div>    
@endif
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
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===practitionerRole===</b>
        </div>
    </div>
@endif