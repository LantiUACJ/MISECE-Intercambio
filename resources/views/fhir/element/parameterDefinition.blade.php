@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===PARAMETERDEFINITION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if ($obj->name)
    <p><b> Nombre: </b>
        {{$obj->name}}
    </p>
@endif
@if ($obj->use)
    <p><b> Uso: </b>
        {{$obj->use}}
    </p>
@endif
@if ($obj->min)
    <p><b> Mínimo: </b>
        {{$obj->min}}
    </p>
@endif
@if ($obj->max)
    <p><b> Máximo: </b>
        {{$obj->max}}
    </p>
@endif
@if ($obj->documentation)
    <p><b> Documentación: </b>
        {{$obj->documentation}}
    </p>
@endif
@if ($obj->type)
    <p><b> Tipo: </b>
        {{$obj->type}}
    </p>
@endif
@if ($obj->profile)
    <p><b> Perfil: </b>
        @include('fhir.element.reference', ["obj"=>$obj->profile])
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-PARAMETERDEFINITION===</b>
        </div>
    </div>
@endif