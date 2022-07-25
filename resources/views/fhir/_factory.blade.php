@if (isset($obj->resourceType))
<ul class="collapsible expandable">
    @switch($obj->resourceType)
        @case("Patient")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Paciente</div>
                <div class="collapsible-body resource patient">
                    @include('fhir.resource.patient',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Observation")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Observación</div>
                <div class="collapsible-body resource observation">
                    @include('fhir.resource.observation',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("MedicationAdministration")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Medicacación</div>
                <div class="collapsible-body resource medicationAdmin">
                    @include('fhir.resource.medicationAdministration',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Encounter")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Encounter</div>
                <div class="collapsible-body resource encounter">
                    @include('fhir.resource.encounter',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("DiagnosticReport")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">DiagnosticReport</div>
                <div class="collapsible-body resource diagnosticReport">
                    @include('fhir.resource.diagnosticReport',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("ImagingStudy")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">ImagingStudy</div>
                <div class="collapsible-body resource imagingStudy">
                    @include('fhir.resource.imagingStudy',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Medication")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Medication</div>
                <div class="collapsible-body resource medication">
                    @include('fhir.resource.medication',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Organization")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Organization</div>
                <div class="collapsible-body resource organization">
                    @include('fhir.resource.organization',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Practitioner")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Practitioner</div>
                <div class="collapsible-body resource practitioner">
                    @include('fhir.resource.practitioner',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Procedure")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Procedure</div>
                <div class="collapsible-body resource procedure">
                    @include('fhir.resource.procedure',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Composition")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Composition</div>
                <div class="collapsible-body resource composition">
                    @include('fhir.resource.composition',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("AllergyIntolerance")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">AllergyIntolerance</div>
                <div class="collapsible-body resource allergy">
                    @include('fhir.resource.allergyIntolerance',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("CarePlan")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">CarePlan</div>
                <div class="collapsible-body resource carePlan">
                    @include('fhir.resource.carePlan',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Location")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Location</div>
                <div class="collapsible-body resource location">
                    @include('fhir.resource.location',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Condition")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Condition</div>
                <div class="collapsible-body resource condition">
                    @include('fhir.resource.condition',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("PractitionerRole")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">PractitionerRole</div>
                <div class="collapsible-body resource practitionerrole">
                    @include('fhir.resource.practitionerrole',["obj"=>$obj])
                </div>
            </li>
        @break
        @case("Bundle")
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Bundle</div>
                <div class="collapsible-body resource bundle">
                    @include('fhir.expediente',["bundle"=>$obj])
                </div>
            </li>
        @break
        @default
            <li>
                <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">Undefined</div>
                <div class="collapsible-body resource bundle">
                    <div class="collapsible-body resource undefined">
                        @include('fhir.resource.undefined',["obj"=>$obj])
                    </div>
                </div>
            </li>
        @break
    @endswitch
</ul>
@endif