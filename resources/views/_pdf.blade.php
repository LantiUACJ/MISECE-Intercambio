@if (!$data)
    <h1>No hay resultados...</h1>
@endif
@foreach ($data as $bundle)
    @if ($bundle["bundle"] && gettype($bundle["bundle"])!="array")
        <h3>Institución/: {{$bundle["hospital"]->nombre}}</h3>
        @include('fhir.expediente', ["bundle"=>$bundle["bundle"]])
    @else
        @if (gettype($bundle)=="array"&&isset($bundle["error"]))
            <h1>{{$bundle["error"]}}</h1>
        @else
            <h1>No hay resultados...</h1>    
        @endif
    @endif
@endforeach
