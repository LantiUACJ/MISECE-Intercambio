@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===carePlan===</b>
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
"instantiatesCanonical" : [{ canonical(PlanDefinition|Questionnaire|Measure|ActivityDefinition|OperationDefinition) }], // Instantiates FHIR protocol or definition
@if (isset($obj->instantiatesUri))
    <div class="row">
        <div class="col s12">
            Uri de la instancia
        </div>
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            <div class="col s6">
                {{$instantiatesUri}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col s12">
            Basado en
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>    
@endif
"replaces" : [{ Reference(CarePlan) }], // CarePlan replaced by this CarePlan
"partOf" : [{ Reference(CarePlan) }], // Part of referenced CarePlan
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"],
                                   ["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->intent))
    <div class="row">
        <div class="col s12">
            Intención: {{ str_replace(["proposal", "plan","order","option"],
                                      ["proposal", "plan","order","option"], strtolower($obj->intent))}}
        </div>
    </div>
@endif
"category" : [{ CodeableConcept }], // Type of plan
@if (isset($obj->title))
    <div class="row">
        <div class="col s12">
            Título: {{ $obj->title }}
        </div>
    </div>
@endif
@if (isset($obj->description))
    <div class="row">
        <div class="col s12">
            Descripción: {{ $obj->description }}
        </div>
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Paciente:
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
@if (isset($obj->created))
    <div class="row">
        <div class="col s12">
            Creado en: {{ $obj->created }}
        </div>
    </div>
@endif
"author" : { Reference(Patient|Practitioner|PractitionerRole|Device|RelatedPerson|Organization|CareTeam) }, // Who is the designated responsible party
@if (isset($obj->author))
    <div class="row">
        <div class="col s12">
            Autor:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->author])
        </div>
    </div>
@endif
"contributor" : [{ Reference(Patient|Practitioner|PractitionerRole|Device|RelatedPerson|Organization|CareTeam) }], // Who provided the content of the care plan
"careTeam" : [{ Reference(CareTeam) }], // Who's involved in plan?
"addresses" : [{ Reference(Condition) }], // Health issues this plan addresses
"supportingInfo" : [{ Reference(Any) }], // Information considered as part of plan
"goal" : [{ Reference(Goal) }], // Desired outcome of plan
"activity" : [{ // Action to occur as part of plan
    "outcomeCodeableConcept" : [{ CodeableConcept }], // Results of the activity
    "outcomeReference" : [{ Reference(Any) }], // Appointment, Encounter, Procedure, etc.
    "progress" : [{ Annotation }], // Comments about the activity status/progress
    "reference" : { Reference(Appointment|CommunicationRequest|DeviceRequest|MedicationRequest|NutritionOrder|Task|ServiceRequest|VisionPrescription|RequestGroup) }, // C? Activity details defined in specific resource
    "detail" : { // C? In-line definition of activity
        "kind" : "<code>", // Appointment | CommunicationRequest | DeviceRequest | MedicationRequest | NutritionOrder | Task | ServiceRequest | VisionPrescription
        "instantiatesCanonical" : [{ canonical(PlanDefinition|ActivityDefinition|Questionnaire|Measure|OperationDefinition) }], // Instantiates FHIR protocol or definition
        "instantiatesUri" : ["<uri>"], // Instantiates external protocol or definition
        "code" : { CodeableConcept }, // Detail type of activity
        "reasonCode" : [{ CodeableConcept }], // Why activity should be done or why activity was prohibited
        "reasonReference" : [{ Reference(Condition|Observation|DiagnosticReport|DocumentReference) }], // Why activity is needed
        "goal" : [{ Reference(Goal) }], // Goals this activity relates to
        "status" : "<code>", // R!  not-started | scheduled | in-progress | on-hold | completed | cancelled | stopped | unknown | entered-in-error
        "statusReason" : { CodeableConcept }, // Reason for current status
        "doNotPerform" : <boolean>, // If true, activity is prohibiting action
        // scheduled[x]: When activity is to occur. One of these 3:
        "scheduledTiming" : { Timing },
        "scheduledPeriod" : { Period },
        "scheduledString" : "<string>",
        "location" : { Reference(Location) }, // Where it should happen
        "performer" : [{ Reference(Practitioner|PractitionerRole|Organization|RelatedPerson|Patient|CareTeam|HealthcareService|Device) }], // Who will be responsible?
        // product[x]: What is to be administered/supplied. One of these 2:
        "productCodeableConcept" : { CodeableConcept },
        "productReference" : { Reference(Medication|Substance) },
        "dailyAmount" : { Quantity(SimpleQuantity) }, // How to consume/day?
        "quantity" : { Quantity(SimpleQuantity) }, // How much to administer/supply/consume
        "description" : "<string>" // Extra info describing activity to perform
    }
}],
"note" : [{ Annotation }] // Comments about the plan
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===carePlan===</b>
        </div>
    </div>
@endif