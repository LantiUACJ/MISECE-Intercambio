<div class="row">

    @if (env("TEST", false))
        <div class="col-12">
            <b>===RESOURCE===</b>
        </div>
    @endif
    @if (isset($obj->resourceType))
        <div class="col-12">
            <h2>
                {{ str_replace(["observation", "medicationadministration","patient","encounter"], ["Observación","Administración de medicamento", "Datos del paciente", "Visita"], strtolower($obj->resourceType))}}
            </h2>
        </div>
    @endif
    @if (isset($obj->id))
        <!--<div class="col-12">
            ID: {{$obj->id}}
        </div>-->
    @endif
    @if (isset($obj->meta) && false)
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    Metadatos:
                </div>
                <div class="col-8">
                    @include('fhir.element.meta',["obj"=>$obj->meta])
                </div>
            </div>
        </div>
    @endif
    @if (isset($obj->implicitRules) && false)
        <div class="col-4">
            Reglas implicitas
            {{$obj->implicitRules}}
        </div>
    @endif
    @if (isset($obj->language))
        <div class="col-4">
            Lenguaje
            {{$obj->language}}
        </div>
    @endif
</div>

@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-RESOURCE===</b>
        </div>
    </div>
@endif