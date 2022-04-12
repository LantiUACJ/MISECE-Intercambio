@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===TRIGGERDEFINITION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "type" : "<code>", // R!  named-event | periodic | data-changed | data-added | data-modified | data-removed | data-accessed | data-access-ended
    "name" : "<string>", // Name or URI that identifies the event
    // timing[x]: Timing of the event. One of these 4:
    "timingTiming" : { Timing },
    "timingReference" : { Reference(Schedule) },
    "timingDate" : "<date>",
    "timingDateTime" : "<dateTime>",
    "data" : [{ DataRequirement }], // Triggering data of the event (multiple = 'and')
    "condition" : { Expression } // Whether the event triggers (boolean expression)
}
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-TRIGGERDEFINITION===</b>
        </div>
    </div>
@endif