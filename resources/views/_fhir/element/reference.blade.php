@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===REFERENCE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
<div class="row">
    @if (isset($obj->reference))
        <div class="col-4">
            Referencia: <br> 
            {{$obj->reference}}
        </div>
    @endif
    @if (isset($obj->type))
        <div class="col-4">
            Tipo: <br> 
            {{ str_replace(["observation", "medicationadministration","patient","encounter"], ["Observación","Administración de medicamento", "Paciente", "Visita"], strtolower($obj->type))}}
        </div>
    @endif
    @if (isset($obj->identifier))
        <div class="col-4">
            Identificador: <br> 
            @include('fhir.element.identifier',["obj"=>$obj->reference])
        </div>
    @endif
    @if (isset($obj->display))
        <div class="col-4">
            Mostrar: <br> 
            {{$obj->display}}
        </div>
    @endif
</div>
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-REFERENCE===</b>
        </div>
    </div>
@endif