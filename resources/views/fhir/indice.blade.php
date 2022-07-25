<ol>
    @if ($paciente = $bundle->findPatient(1,1))
        <li>@include('fhir.element.reference',["obj"=>$paciente->toReference()])</li>
    @endif
    @foreach ($bundle->entry as $entry)
        @if ($entry->resourceType == "Composition")
            <li>@include('fhir.element.reference',["obj"=>$entry->toReference()])</li>
            <ol>
                @foreach ($entry->getReferences() as $ref)
                    @if ($resource = $bundle->findResource($ref->getReferenceId(), 1, 1))
                        <li>{{$resource->id}} @include('fhir.element.reference',["obj"=>$resource->toReference()])</li>
                    @endif
                @endforeach
            </ol>
        @else
            @if ($entry->mark != 1)
                <li>@include('fhir.element.reference',["obj"=>$entry->toReference()])</li>
            @endif
        @endif
    @endforeach
</ol>