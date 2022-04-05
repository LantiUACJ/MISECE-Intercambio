@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===TIMING===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{
    // from BackboneElement: extension, modifierExtension
    "event" : ["<dateTime>"], // When the event occurs
    "repeat" : { // When the event is to occur
        // bounds[x]: Length/Range of lengths, or (Start and/or end) limits. One of these 3:
        "boundsDuration" : { Duration },
        "boundsRange" : { Range },
        "boundsPeriod" : { Period },
        "count" : "<positiveInt>", // Number of times to repeat
        "countMax" : "<positiveInt>", // Maximum number of times to repeat
        "duration" : <decimal>, // How long when it happens
        "durationMax" : <decimal>, // How long when it happens (Max)
        "durationUnit" : "<code>", // s | min | h | d | wk | mo | a - unit of time (UCUM)
        "frequency" : "<positiveInt>", // Event occurs frequency times per period
        "frequencyMax" : "<positiveInt>", // Event occurs up to frequencyMax times per period
        "period" : <decimal>, // Event occurs frequency times per period
        "periodMax" : <decimal>, // Upper limit of period (3-4 hours)
        "periodUnit" : "<code>", // s | min | h | d | wk | mo | a - unit of time (UCUM)
        "dayOfWeek" : ["<code>"], // mon | tue | wed | thu | fri | sat | sun
        "timeOfDay" : ["<time>"], // Time of day for action
        "when" : ["<code>"], // Code for time period of occurrence
        "offset" : "<unsignedInt>" // Minutes from event (before or after)
    },
    "code" : { CodeableConcept } // BID | TID | QID | AM | PM | QD | QOD | +
}
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-TIMING===</b>
        </div>
    </div>
@endif