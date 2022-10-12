@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===TRIGGERDEFINITION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ($obj->type)
    <p><b>Tipo: </b>
        {{str_replace(["named-event","periodic","data-changed","data-added","data-modified","data-removed","data-accessed","data-access-ended"],
                      ["named-event","periodic","data-changed","data-added","data-modified","data-removed","data-accessed","data-access-ended"],$obj->type)}}
    </p>
@endif
@if ($obj->name)
    <p><b>Nombre: </b>
        @include('fhir.element.range', ["obj"=>$obj->name])
    </p>
@endif
@if ($obj->timingTiming)
    <p><b>Momento: </b>
        @include('fhir.element.timing', ["obj"=>$obj->timingTiming])
    </p>
@endif
@if ($obj->timingReference)
    <p><b>Momento: </b>
        @include('fhir.element.reference', ["obj"=>$obj->timingReference])
    </p>
@endif
@if ($obj->timingDate)
    <p><b>Momento: </b>
        {{$obj->timingDate}}
    </p>
@endif
@if ($obj->timingDateTime)
    <p><b>Momento: </b>
        {{$obj->timingDateTime}}
    </p>
@endif
@if ($obj->data)
    <p><b>Datos: </b></p>
    <div class="element">
        @foreach ($obj->data as $data)
            * @include('fhir.element.dataRequirement', ["obj"=>$data]) <br>
        @endforeach
    </div>
@endif
@if ($obj->condition)
    <p><b>Condición: </b>
        @include('fhir.element.expression', ["obj"=>$obj->condition])
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-TRIGGERDEFINITION===</b>
        </div>
    </div>
@endif