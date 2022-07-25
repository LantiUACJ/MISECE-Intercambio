@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===RESOURCE===</b></div></div>
@endif
@if (isset($obj->resourceType))
    <h3>
        {{ str_replace(
            [
                "observation", 
                "medicationadministration",
                "patient",
                "encounter",
                "location",
                "composition",
                "allergyintolerance",
                "careplan",
                "practitionerrole",
                "practitioner",
                "medication",
                "organization",
                "condition",
                "diagnosticreport",
                "procedure",
                "imagingstudy",
            ], [
                "Observación",
                "Administración de medicamento", 
                "Datos del paciente", 
                "Visita",
                "Lugar",
                "Composición",
                "Alergia",
                "Plan de cuidado",
                "Rol de Practicante",
                "Practicante",
                "Medicación",
                "Organización",
                "Condición",
                "Reporte de diagnóstico",
                "Procedimiento",
                "Estudio de imagen",
            ], strtolower($obj->resourceType))}}
    </h3>
@endif
<div class="element">
    {{-- @if (isset($obj->id))
        <p id="{{$obj->resourceType.'/'.$obj->id}}">Identificador: {{$obj->id}}</p>
    @endif --}}
    @if (isset($obj->meta))
        <p>Metadatos:</p>
        <div class="element">
            @include('fhir.element.meta',["obj"=>$obj->meta])
        </div>
    @endif
    @if (isset($obj->implicitRules))
        Reglas implicitas: {{$obj->implicitRules}}
    @endif
    @if (isset($obj->language))
        Lenguaje del documento: <b>{{$obj->language}}</b>.
    @endif
</div>
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-RESOURCE===</b>
        </div>
    </div>
@endif