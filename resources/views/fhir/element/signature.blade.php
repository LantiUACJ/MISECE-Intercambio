@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===SIGNATURE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if ($obj->type)
    <p><b>Código: </b>
        @include('fhir.element.coding', ["obj"=>$obj->type])
    </p>
@endif
@if ($obj->when)
    <p><b>Fecha de firmado: </b>
        {{$obj->when}}
    </p>
@endif
@if ($obj->who)
    <p><b>Firmado Por: </b>
        @include('fhir.element.reference', ["obj"=>$obj->who])
    </p>
@endif
@if ($obj->onBehalfOf)
    <p><b>En representación de: </b>
        @include('fhir.element.reference', ["obj"=>$obj->onBehalfOf])
    </p>
@endif
@if ($obj->targetFormat)
    <p><b>Formato objetivo: </b>
        {{$obj->targetFormat}}
    </p>
@endif
@if ($obj->sigFormat)
    <p><b>Formato técnico de la firma: </b>
        {{$obj->sigFormat}}
    </p>
@endif
@if ($obj->data)
    <p><b>Datos: </b>
        {{$obj->data}}
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-SIGNATURE===</b>
        </div>
    </div>
@endif