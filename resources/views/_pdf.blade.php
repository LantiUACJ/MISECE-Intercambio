<div class="container">
    @if (!$data)
        <h1>No hay resultados...</h1>
    @endif
    @foreach ($data as $bundle)
        @if ($bundle["bundle"] && gettype($bundle["bundle"])!="array")
            <h1>Institución: {{$bundle["hospital"]->user}}</h1>
            @foreach ($bundle["bundle"]->entry as $entry)
                @include('fhir._factory', ["obj"=>$entry->resource])
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