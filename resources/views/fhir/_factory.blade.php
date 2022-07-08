@if (isset($obj->resourceType))
    @switch($obj->resourceType)
        @case("Patient")
            <div class="resource patient">
                @include('fhir.resource.patient',["obj"=>$obj])
            </div>
        @break
        @case("Observation")
            <div class="resource observation">
                @include('fhir.resource.observation',["obj"=>$obj])
            </div>
        @break
        @case("MedicationAdministration")
            <div class="resource medicationAdmin">
                @include('fhir.resource.medicationAdministration',["obj"=>$obj])
            </div>
        @break
        @case("Encounter")
            <div class="resource encounter">
                @include('fhir.resource.encounter',["obj"=>$obj])
            </div>
        @break
        @case("DiagnosticReport")
            <div class="resource diagnosticReport">
                @include('fhir.resource.diagnosticReport',["obj"=>$obj])
            </div>
        @break
        @case("ImagingStudy")
            <div class="resource imagingStudy">
                @include('fhir.resource.imagingStudy',["obj"=>$obj])
            </div>
        @break
        @case("Medication")
            <div class="resource medication">
                @include('fhir.resource.medication',["obj"=>$obj])
            </div>
        @break
        @case("Organization")
            <div class="resource organization">
                @include('fhir.resource.organization',["obj"=>$obj])
            </div>
        @break
        @case("Practitioner")
            <div class="resource practitioner">
                @include('fhir.resource.practitioner',["obj"=>$obj])
            </div>
        @break
        @case("Procedure")
            <div class="resource procedure">
                @include('fhir.resource.procedure',["obj"=>$obj])
            </div>
        @break
        @case("Composition")
            <div class="resource composition">
                @include('fhir.resource.composition',["obj"=>$obj])
            </div>
        @break
        @case("AllergyIntolerance")
            <div class="resource allergy">
                @include('fhir.resource.allergyIntolerance',["obj"=>$obj])
            </div>
        @break
        @case("CarePlan")
            <div class="resource carePlan">
                @include('fhir.resource.carePlan',["obj"=>$obj])
            </div>
        @break
        @case("Location")
            <div class="resource location">
                @include('fhir.resource.location',["obj"=>$obj])
            </div>
        @break
        @case("Condition")
            <div class="resource condition">
                @include('fhir.resource.condition',["obj"=>$obj])
            </div>
        @break
        @case("PractitionerRole")
            <div class="resource practitionerrole">
                @include('fhir.resource.practitionerrole',["obj"=>$obj])
            </div>
        @break
        @case("Bundle")
            <div class="resource bundle">
                @if (isset($obj->entry))
                    @foreach ($obj->entry as $entry)
                        @if (isset($entry->resource))
                            @include('fhir._factory',["obj"=>$entry->resource])
                        @endif
                    @endforeach
                @else
                    
                @endif
            </div>
        @break
        @default
            <div class="resource undefined">
                @include('fhir.resource.undefined',["obj"=>$obj])
            </div>
        @break
    @endswitch
@endif
<br>