@if (isset($obj->resourceType))
    @switch($obj->resourceType)
        @case("Patient")
            <div class="resource patient">
                @include('fhir.resource.patient',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Observation")
            <div class="resource observation">
                @include('fhir.resource.observation',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("MedicationAdministration")
            <div class="resource medicationAdmin">
                @include('fhir.resource.medicationAdministration',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Encounter")
            <div class="resource encounter">
                @include('fhir.resource.encounter',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("DiagnosticReport")
            <div class="resource diagnosticReport">
                @include('fhir.resource.diagnosticReport',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("ImagingStudy")
            <div class="resource imagingStudy">
                @include('fhir.resource.imagingStudy',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Medication")
            <div class="resource medication">
                @include('fhir.resource.medication',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Organization")
            <div class="resource organization">
                @include('fhir.resource.organization',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Practitioner")
            <div class="resource practitioner">
                @include('fhir.resource.practitioner',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Procedure")
            <div class="resource procedure">
                @include('fhir.resource.procedure',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Composition")
            <div class="resource composition">
                @include('fhir.resource.composition',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("AllergyIntolerance")
            <div class="resource allergy">
                @include('fhir.resource.allergyIntolerance',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("CarePlan")
            <div class="resource carePlan">
                @include('fhir.resource.carePlan',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Location")
            <div class="resource location">
                @include('fhir.resource.location',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("Condition")
            <div class="resource condition">
                @include('fhir.resource.condition',["obj"=>$obj])
            </div>
            <hr>
        @break
        @case("PractitionerRole")
            <div class="resource practitionerrole">
                @include('fhir.resource.practitionerrole',["obj"=>$obj])
            </div>
            <hr>
        @break
        @default
            <div class="resource undefined">
                @include('fhir.resource.undefined',["obj"=>$obj])
            </div>
            <hr>
        @break
    @endswitch
@endif