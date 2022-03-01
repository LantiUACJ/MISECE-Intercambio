<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            .bloque{
                margin-bottom: 10px;
                background-color: rgba(0,0,0,0.2);
            }
            div{
                word-wrap: break-word;
            }
            div.row{
                border: 1px solid black;
                width: 100%;
            }
            table{
                border: 1px solid black;
            }
            td{
                border: 1px solid black;
            }

            .patient{
                background-color: rgb(255, 236, 236) !important;
            }
            .encounter{
                background-color: rgb(202, 202, 202) !important;
            }
            .observation{
                background-color: rgb(209, 247, 165) !important;
            }
            .medicationAdmin{
                background-color: #68d4d8 !important;
            }
            .diagnosticReport{
                background-color: #abddab !important;
            }
            .imagingStudy{
                background-color: #caaef7 !important;
            }
            .medication{
                background-color: #dbee87 !important;
            }
            .organization{
                background-color: #57aeff !important;
            }
            .practitioner{
                background-color: #80a389 !important;
            }
            .procedure{
                background-color: #d3bfda !important;
            }
        </style>
        <title>Document</title>
    </head>
    <body>
        @if (!$data)
            <h1>No hay resultados...</h1>
        @endif
        @foreach ($data as $bundle)
            @if ($bundle["bundle"] && gettype($bundle["bundle"])!="array")
                <h1>Hospital: {{$bundle["hospital"]->user}}</h1>
                @foreach ($bundle["bundle"]->entry as $entry)
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Patient" && true)
                        <div class="patient">
                            @include('fhir.resource.patient',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Observation" && true)
                        <div class="observation">
                            @include('fhir.resource.observation',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "MedicationAdministration" && true)
                        <div class="medicationAdmin">
                            @include('fhir.resource.medicationAdministration',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Encounter" && true)
                        <div class="encounter">
                            @include('fhir.resource.encounter',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "DiagnosticReport" && true)
                        <div class="diagnosticReport">
                            @include('fhir.resource.diagnosticReport',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "ImagingStudy" && true)
                        <div class="imagingStudy">
                            @include('fhir.resource.imagingStudy',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Medication" && true)
                        <div class="medication">
                            @include('fhir.resource.medication',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Organization" && true)
                        <div class="organization">
                            @include('fhir.resource.organization',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Practitioner" && true)
                        <div class="practitioner">
                            @include('fhir.resource.practitioner',["obj"=>$entry->resource])
                        </div><br><br>
                    @endif
                    @if (isset($entry->resource->resourceType) && $entry->resource->resourceType == "Procedure" && true)
                        <div class="procedure">
                            @include('fhir.resource.procedure',["obj"=>$entry->resource])
                        </div><br><br>
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
        <!--
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        -->
    </body>
</html>