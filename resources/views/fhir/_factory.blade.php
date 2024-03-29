@if (isset($obj->resourceType))
<ul class="collapsible expandable">
    @switch($obj->resourceType)
        @case("Patient")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.patient',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.patient',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Observation")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.observation',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.observation',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("MedicationAdministration")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.medicationAdministration',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}"> {{$obj->toString()}} </div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.medicationAdministration',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Encounter")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.encounter',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}"> {{$obj->toString()}} </div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.encounter',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("DiagnosticReport")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.diagnosticReport',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.diagnosticReport',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("ImagingStudy")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.imagingStudy',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.imagingStudy',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Medication")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.medication',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.medication',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Organization")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.organization',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.organization',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Practitioner")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.practitioner',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.practitioner',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Procedure")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.procedure',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.procedure',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Composition")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.composition',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.composition',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("AllergyIntolerance")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.allergyIntolerance',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.allergyIntolerance',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("CarePlan")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.carePlan',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.carePlan',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Location")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.location',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.location',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Condition")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.condition',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.condition',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("PractitionerRole")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.practitionerrole',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.practitionerrole',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("Bundle")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.expediente',["bundle"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.expediente',["bundle"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("FamilyMemberHistory")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.familyMemberHistory',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.familyMemberHistory',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @case("MedicationRequest")
            @if(isset($not) && $not)
                <div class="resource observation">
                    @include('fhir.resource.medicationRequest',["obj"=>$obj])
                </div>
            @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        @include('fhir.resource.medicationRequest',["obj"=>$obj])
                    </div>
                </li>
            @endif
        @break
        @default
            @if(isset($not) && $not)
                <div class="resource observation">
                    <div class="collapsible-body resource observation">
                </div>
                @else
                <li>
                    <div class="collapsible-header" id="{{$obj->resourceType.'/'.$obj->id}}">{{$obj->toString()}}</div>
                    <div class="collapsible-body resource observation">
                        <div class="collapsible-body resource observation">
                            @include('fhir.resource.undefined',["obj"=>$obj])
                        </div>
                    @endif
                </div>
            </li>
        @break
    @endswitch
</ul>
@endif