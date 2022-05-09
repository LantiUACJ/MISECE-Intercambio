@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===condition===</b>
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
"clinicalStatus" : { CodeableConcept }, // C? active | recurrence | relapse | inactive | remission | resolved
"verificationStatus" : { CodeableConcept }, // C? unconfirmed | provisional | differential | confirmed | refuted | entered-in-error
@if (isset($obj->category))
    <div class="row">
        <div class="col s12">
            Categoría
        </div>
        @foreach ($obj->category as $category)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$category])
            </div>
        @endforeach
    </div>    
@endif
"severity" : { CodeableConcept }, // Subjective severity of condition
@if (isset($obj->code))
    <div class="row">
        <div class="col s12">
            Código
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
"bodySite" : [{ CodeableConcept }], // Anatomical location, if relevant
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Sujeto
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col s12">
            Visita
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
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
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===condition===</b>
        </div>
    </div>
@endif