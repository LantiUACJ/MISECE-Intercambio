<ol>
    @if ($paciente = $bundle->findPatient(1,1))
        <li>@include('fhir.element.reference',["obj"=>$paciente->toReference()])</li>
    @endif
    @foreach ($bundle->findCompositions(1,1,0) as $entry)
        <li>@include('fhir.element.reference',["obj"=>$entry->toReference()])</li>
        @foreach ($entry->getReferences() as $ref)
            <?php  $bundle->findResource($ref->getReferenceId(), 1, 1); ?>
        @endforeach
        <ol>
            @foreach ($entry->section as $key => $ref)
                <li>
                    <a href="#{{$entry->resourceType."/".$entry->id . $key}}" onclick="$('#{{$entry->resourceType."\\\\/".$entry->id . $key}}').click()">(ver) {{$ref->title}} </a>
                </li>
            @endforeach
        </ol>
    @endforeach
    @foreach ($bundle->findCompositions(1,1,1) as $entry)
        <li>@include('fhir.element.reference',["obj"=>$entry->toReference()])</li>
        @foreach ($entry->getReferences() as $ref)
            <?php  $bundle->findResource($ref->getReferenceId(), 1, 1); ?>
        @endforeach
        <ol>
            @foreach ($entry->section as $key => $ref)
                <li>
                    <a href="#{{$entry->resourceType."/".$entry->id . $key}}" onclick="$('#{{$entry->resourceType."\\\\/".$entry->id . $key}}').click()">(ver) {{$ref->title}} </a>
                </li>
            @endforeach
        </ol>
    @endforeach
    @foreach ($bundle->entry as $entry)
        @if ($entry->mark != 1)
            <li>@include('fhir.element.reference',["obj"=>$entry->toReference()])</li>
        @endif
    @endforeach
</ol>