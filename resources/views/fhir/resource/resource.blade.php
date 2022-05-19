<div class="row">

    @if (env("TEST", false))
        <div class="col s12">
            <b>===RESOURCE===</b>
        </div>
    @endif
    @if (isset($obj->resourceType))
        <div class="col s12">
            <h2>
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
                    ], [
                        "Observación",
                        "Administración de medicamento", 
                        "Datos del paciente", 
                        "Visita",
                        "Lugar",
                        "Composición",
                        "Alergias",
                        "Plan de cuidado",
                        "Rol de Practicante",
                        "Practicante",
                        "Medicación",
                    ], strtolower($obj->resourceType))}}
            </h2>
        </div>
    @endif
    @if (isset($obj->id))
        <!--<div class="col s12">
            ID: {{$obj->id}}
        </div>-->
    @endif
    @if (isset($obj->meta) && false)
        <div class="col s12">
            <div class="row">
                <div class="col s4">
                    Metadatos:
                </div>
                <div class="col s8">
                    @include('fhir.element.meta',["obj"=>$obj->meta])
                </div>
            </div>
        </div>
    @endif
    @if (isset($obj->implicitRules) && false)
        <div class="col s4">
            Reglas implicitas
            {{$obj->implicitRules}}
        </div>
    @endif
    @if (isset($obj->language))
        <div class="col s4">
            Lenguaje
            {{$obj->language}}
        </div>
    @endif
</div>

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-RESOURCE===</b>
        </div>
    </div>
@endif