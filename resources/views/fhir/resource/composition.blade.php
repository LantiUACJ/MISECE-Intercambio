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
    "status" : "<code>", // R!  preliminary | final | amended | entered-in-error
    "type" : { CodeableConcept }, // R!  Kind of composition (LOINC if possible)
    "category" : [{ CodeableConcept }], // Categorization of Composition
    "subject" : { Reference(Any) }, // Who and/or what the composition is about
    "encounter" : { Reference(Encounter) }, // Context of the Composition
    "date" : "<dateTime>", // R!  Composition editing time
    "author" : [{ Reference(Practitioner|PractitionerRole|Device|Patient|RelatedPerson|Organization) }], // R!  Who and/or what authored the composition
    "title" : "<string>", // R!  Human Readable name/title
    "confidentiality" : "<code>", // As defined by affinity domain
    "attester" : [{ // Attests to accuracy of composition
        "mode" : "<code>", // R!  personal | professional | legal | official
        "time" : "<dateTime>", // When the composition was attested
        "party" : { Reference(Patient|RelatedPerson|Practitioner|PractitionerRole|Organization) } // Who attested the composition
    }],
    "custodian" : { Reference(Organization) }, // Organization which maintains the composition
    "relatesTo" : [{ // Relationships to other compositions/documents
        "code" : "<code>", // R!  replaces | transforms | signs | appends
        // target[x]: Target of the relationship. One of these 2:
        "targetIdentifier" : { Identifier }
        "targetReference" : { Reference(Composition) }
    }],
    "event" : [{ // The clinical service(s) being documented
        "code" : [{ CodeableConcept }], // Code(s) that apply to the event being documented
        "period" : { Period }, // The period covered by the documentation
        "detail" : [{ Reference(Any) }] // The event(s) being documented
    }],
    "section" : [{ // Composition is broken into sections
        "title" : "<string>", // Label for section (e.g. for ToC)
        "code" : { CodeableConcept }, // Classification of section (recommended)
        "author" : [{ Reference(Practitioner|PractitionerRole|Device|Patient|RelatedPerson|Organization) }], // Who and/or what authored the section
        "focus" : { Reference(Any) }, // Who/what the section is about, when it is not about the subject of composition
        "text" : { Narrative }, // C? Text summary of the section, for human interpretation
        "mode" : "<code>", // working | snapshot | changes
        "orderedBy" : { CodeableConcept }, // Order of section entries
        "entry" : [{ Reference(Any) }], // C? A reference to data that supports this section
        "emptyReason" : { CodeableConcept }, // C? Why the section is empty
        "section" : [{ Content as for Composition.section }] // C? Nested Section
    }]
  }