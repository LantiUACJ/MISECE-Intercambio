<div class="row">
    <div class="col-xs-12">
        <b>===RESOURCE===</b>
    </div>
    @if (isset($obj->resourceType))
        <div class="col-xs-12">
            <h2>
                {{ str_replace(["observation", "medicationadministration","patient","encounter"], ["Observación","Administración de medicamento", "Datos del paciente", "Visita"], strtolower($obj->resourceType))}}
            </h2>
        </div>
    @endif
    @if (isset($obj->id))
        <div class="col-xs-12">
            ID: {{$obj->id}}
        </div>
    @endif
    @if (isset($obj->meta) && false)
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-4">
                    Metadatos:
                </div>
                <div class="col-xs-8">
                    @include('fhir.element.meta',["obj"=>$obj->meta])
                </div>
            </div>
        </div>
    @endif
    @if (isset($obj->implicitRules) && false)
        <div class="col-xs-4">
            Reglas implicitas
            {{$obj->implicitRules}}
        </div>
    @endif
    @if (isset($obj->language))
        <div class="col-xs-4">
            Lenguaje
            {{$obj->language}}
        </div>
    @endif
</div>

<div class="row">
    <div class="col-xs-12">
        <b>===END-RESOURCE===</b>
    </div>
</div>