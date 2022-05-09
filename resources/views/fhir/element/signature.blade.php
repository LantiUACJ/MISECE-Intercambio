@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===SIGNATURE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{
    // from Element: extension
    "type" : [{ Coding }], // R!  Indication of the reason the entity signed the object(s)
    "when" : "<instant>", // R!  When the signature was created
    "who" : { Reference(Practitioner|PractitionerRole|RelatedPerson|Patient|
     Device|Organization) }, // R!  Who signed
    "onBehalfOf" : { Reference(Practitioner|PractitionerRole|RelatedPerson|
     Patient|Device|Organization) }, // The party represented
    "targetFormat" : "<code>", // The technical format of the signed resources
    "sigFormat" : "<code>", // The technical format of the signature
    "data" : "<base64Binary>" // The actual signature content (XML DigSig. JWS, picture, etc.)
}
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-SIGNATURE===</b>
        </div>
    </div>
@endif