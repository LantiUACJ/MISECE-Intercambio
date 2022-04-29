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
    "clinicalStatus" : { CodeableConcept }, // C? active | inactive | resolved
    "verificationStatus" : { CodeableConcept }, // C? unconfirmed | confirmed | refuted | entered-in-error
    "type" : "<code>", // allergy | intolerance - Underlying mechanism (if known)
    "category" : ["<code>"], // food | medication | environment | biologic
    "criticality" : "<code>", // low | high | unable-to-assess
    "code" : { CodeableConcept }, // Code that identifies the allergy or intolerance
    "patient" : { Reference(Patient) }, // R!  Who the sensitivity is for
    "encounter" : { Reference(Encounter) }, // Encounter when the allergy or intolerance was asserted
    // onset[x]: When allergy or intolerance was identified. One of these 5:
    "onsetDateTime" : "<dateTime>",
    "onsetAge" : { Age },
    "onsetPeriod" : { Period },
    "onsetRange" : { Range },
    "onsetString" : "<string>",
    "recordedDate" : "<dateTime>", // Date first version of the resource instance was recorded
    "recorder" : { Reference(Practitioner|PractitionerRole|Patient|RelatedPerson) }, // Who recorded the sensitivity
    "asserter" : { Reference(Patient|RelatedPerson|Practitioner|PractitionerRole) }, // Source of the information about the allergy
    "lastOccurrence" : "<dateTime>", // Date(/time) of last known occurrence of a reaction
    "note" : [{ Annotation }], // Additional text not captured in other fields
    "reaction" : [{ // Adverse Reaction Events linked to exposure to substance
        "substance" : { CodeableConcept }, // Specific substance or pharmaceutical product considered to be responsible for event
        "manifestation" : [{ CodeableConcept }], // R!  Clinical symptoms/signs associated with the Event
        "description" : "<string>", // Description of the event as a whole
        "onset" : "<dateTime>", // Date(/time) when manifestations showed
        "severity" : "<code>", // mild | moderate | severe (of event as a whole)
        "exposureRoute" : { CodeableConcept }, // How the subject was exposed to the substance
        "note" : [{ Annotation }] // Text about event not captured in other fields
    }]
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===AllergyIntolerance===</b>
        </div>
    </div>
@endif