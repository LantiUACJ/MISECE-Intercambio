
<div id="top-expediente{{$bundle->id}}"></div>

<h3>Índice</h3>

@include('fhir.indice', ["obj"=>$bundle])

<?php $paciente = $bundle->findPatient(2, 2); ?>
@if ($paciente)
    <ul class="collapsible expandable">
        <li>
            <div class="collapsible-header" id="<?= $paciente->resourceType.'/'. $paciente->id ?>"><?= $paciente->toString() ?></div>
            <div class="collapsible-body resource observation">
                @include('fhir._factory', ["obj"=>$paciente, "not"=>true])
                @foreach ($bundle->findAllergy(2) as $allergy)
                    @include('fhir._factory', ["obj"=>$allergy, "not"=>true])
                @endforeach
            </div>
        </li>
    </ul>
@endif

@foreach ($bundle->findNotaEvolucion(2,2) as $key => $composition)
    <div id="{{$composition->resourceType.'/'.$composition->id}}"></div>
    <div class="element">
        <h4>#{{$key+1}} Nota de evolución</h4>
        @if (isset($composition->encounter))
            @include('fhir._factory', ["obj"=>$bundle->findResource($composition->encounter->getReferenceId(), 2, 2)])
        @endif

        @foreach ($composition->section as $key => $section)
            <ul class="collapsible expandable">
                <li>
                    @if (isset($section->title))
                        <div class="collapsible-header" id="{{$composition->resourceType.'/'.$composition->id . $key}}">
                            <h4>{{$section->title}}</h4>
                        </div>
                    @endif
                    <div class="collapsible-body">
                        @foreach ($section->getReferences() as $reference)
                            @include('fhir._factory', ["obj"=>$bundle->findResource($reference->getReferenceId(), 2, 2), "not"=>true])
                        @endforeach
                    </div>
                </li>
            </ul>
        @endforeach
    </div>
@endforeach

@foreach ($bundle->findHistoriaClinica(2,2) as $key => $composition)
    <div id="{{$composition->resourceType.'/'.$composition->id}}"></div>
    <div class="element">
        <h4>#{{$key+1}} Historia clínica</h4>
        @if (isset($composition->encounter))
            @include('fhir._factory', ["obj"=>$bundle->findResource($composition->encounter->getReferenceId(), 2, 2)])
        @endif

        @foreach ($composition->section as $key => $section)
            <ul class="collapsible expandable">
                <li>
                    @if (isset($section->title))
                        <div class="collapsible-header" id="{{$composition->resourceType.'/'.$composition->id . $key}}">
                            <h4>{{$section->title}}</h4>
                        </div>
                    @endif
                    <div class="collapsible-body">
                        @foreach ($section->getReferences() as $reference)
                            @include('fhir._factory', ["obj"=>$bundle->findResource($reference->getReferenceId(), 2, 2), "not"=>true])
                        @endforeach
                    </div>
                </li>
            </ul>
        @endforeach
    </div>
@endforeach

@foreach ($bundle->entry as $entry)
    @if ($entry->mark != 2)
        @include('fhir._factory', ["obj"=>$entry])
    @endif
@endforeach

<div style="position: fixed; bottom: 8%; right: 5%; padding: 20px; background-color: black; border-radius: 25px;">
    <a href="#top-expediente{{$bundle->id}}"> <i class="material-icons">arrow_upward</i>  Regresar</a>
</div>