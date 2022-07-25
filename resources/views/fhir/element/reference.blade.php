@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===REFERENCE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->reference))
    <a href="#{{$obj->reference}}">(ver)
@endif
<!-- @if (isset($obj->type))
    Tipo: {{ str_replace(["observation", "medicationadministration","patient","encounter"], ["Observación","Administración de medicamento", "Paciente", "Visita"], strtolower($obj->type))}}
@endif -->
@if (isset($obj->identifier))
    Identificador:
    @include('fhir.element.identifier',["obj"=>$obj->identifier])
@endif
@if (isset($obj->display) && $obj->display)
    {{$obj->display}}
@else
    @if (isset($obj->reference))
        {{$obj->reference}}
    @endif
@endif

@if (isset($obj->reference))
    </a>
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-REFERENCE===</b>
        </div>
    </div>
@endif