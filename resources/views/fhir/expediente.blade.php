
<div id="top-expediente{{$bundle->id}}"></div>

<h3>Índice</h3>
@include('fhir.indice', ["obj"=>$bundle])

<h3>Paciente...</h3>
@include('fhir._factory', ["obj"=>$bundle->findPatient(2,2)])
@foreach ($bundle->findAllergy(2,2) as $allergy)
    @include('fhir._factory', ["obj"=>$allergy])
@endforeach

<h3>Compositions...</h3>
@foreach ($bundle->findCompositions(2,2) as $composition)
    @include('fhir._factory', ["obj"=>$composition])
    @foreach ($composition->getReferences() as $reference)
        @include('fhir._factory', ["obj"=>$bundle->findResource($reference->getReferenceId(), 2, 2)])
    @endforeach
@endforeach

<h3>Lo demás...</h3>
@foreach ($bundle->entry as $entry)
    @if ($entry->mark != 2)
        @include('fhir._factory', ["obj"=>$entry])
    @endif
@endforeach

<div style="position: fixed; bottom: 8%; right: 5%; padding: 20px; background-color: black; border-radius: 25px;">
    <a href="#top-expediente{{$bundle->id}}"> <i class="material-icons">arrow_upward</i>  Regresar</a>
</div>