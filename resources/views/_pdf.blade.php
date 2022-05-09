<div class="container">
    @if (!$data)
        <h1>No hay resultados...</h1>
    @endif
    @foreach ($data as $bundle)
        @if ($bundle["bundle"] && gettype($bundle["bundle"])!="array")
            <h1>Hospital: {{$bundle["hospital"]->user}}</h1>
            @foreach ($bundle["bundle"]->entry as $entry)
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Patient")
                    <div class="patient">
                        @include('fhir.resource.patient',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Observation")
                    @if ( isset($entry->resource->encounter))
                        <div class="observation">
                            @include('fhir.resource.observation',["obj"=>$entry->resource])
                        </div>
                    @endif
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "MedicationAdministration")
                    <div class="medicationAdmin">
                        @include('fhir.resource.medicationAdministration',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Encounter")
                    <div class="encounter">
                        @include('fhir.resource.encounter',["obj"=>$entry->resource, "fullUrl"=>$entry->fullUrl])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "DiagnosticReport")
                    <div class="diagnosticReport">
                        @include('fhir.resource.diagnosticReport',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "ImagingStudy")
                    <div class="imagingStudy">
                        @include('fhir.resource.imagingStudy',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Medication")
                    <div class="medication">
                        @include('fhir.resource.medication',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Organization")
                    <div class="organization">
                        @include('fhir.resource.organization',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Practitioner")
                    <div class="practitioner">
                        @include('fhir.resource.practitioner',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Procedure")
                    <div class="procedure">
                        @include('fhir.resource.procedure',["obj"=>$entry->resource])
                    </div>
                @endif
                @if (!isset($entry->resource->resourceType))
                    {{dd($entry)}}
                @endif
            @endforeach
        @else
            @if (gettype($bundle)=="array"&&isset($bundle["error"]))
                <h1>{{$bundle["error"]}}</h1>
            @else
                <h1>No hay resultados...</h1>    
            @endif
            
        @endif
    @endforeach
</div>