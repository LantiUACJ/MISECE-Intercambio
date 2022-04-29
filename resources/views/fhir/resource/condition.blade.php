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
    "clinicalStatus" : { CodeableConcept }, // C? active | recurrence | relapse | inactive | remission | resolved
    "verificationStatus" : { CodeableConcept }, // C? unconfirmed | provisional | differential | confirmed | refuted | entered-in-error
    "category" : [{ CodeableConcept }], // problem-list-item | encounter-diagnosis
    "severity" : { CodeableConcept }, // Subjective severity of condition
    "code" : { CodeableConcept }, // Identification of the condition, problem or diagnosis
    "bodySite" : [{ CodeableConcept }], // Anatomical location, if relevant
    "subject" : { Reference(Patient|Group) }, // R!  Who has the condition?
    "encounter" : { Reference(Encounter) }, // Encounter created as part of
    // onset[x]: Estimated or actual date,  date-time, or age. One of these 5:
    "onsetDateTime" : "<dateTime>",
    "onsetAge" : { Age },
    "onsetPeriod" : { Period },
    "onsetRange" : { Range },
    "onsetString" : "<string>",
    // abatement[x]: When in resolution/remission. One of these 5:
    "abatementDateTime" : "<dateTime>",
    "abatementAge" : { Age },
    "abatementPeriod" : { Period },
    "abatementRange" : { Range },
    "abatementString" : "<string>",
    "recordedDate" : "<dateTime>", // Date record was first recorded
    "recorder" : { Reference(Practitioner|PractitionerRole|Patient|RelatedPerson) }, // Who recorded the condition
    "asserter" : { Reference(Practitioner|PractitionerRole|Patient|RelatedPerson) }, // Person who asserts this condition
    "stage" : [{ // Stage/grade, usually assessed formally
        "summary" : { CodeableConcept }, // C? Simple summary (disease specific)
        "assessment" : [{ Reference(ClinicalImpression|DiagnosticReport|Observation) }], // C? Formal record of assessment
        "type" : { CodeableConcept } // Kind of staging
    }],
    "evidence" : [{ // Supporting evidence
        "code" : [{ CodeableConcept }], // C? Manifestation/symptom
        "detail" : [{ Reference(Any) }] // C? Supporting information found elsewhere
    }],
    "note" : [{ Annotation }] // Additional information about the Condition
  }