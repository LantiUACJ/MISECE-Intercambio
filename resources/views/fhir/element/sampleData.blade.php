@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===SAMPLEDATA===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ($obj->origin)
    <p><b>Código: </b>
        @include('fhir.element.quantity', ["obj"=>$obj->origin])
    </p>
@endif
@if ($obj->period)
    <p><b>Código: </b>
        {{$obj->period}}
    </p>
@endif
@if ($obj->factor)
    <p><b>Código: </b>
        {{$obj->factor}}
    </p>
@endif
@if ($obj->lowerLimit)
    <p><b>Código: </b>
        {{$obj->lowerLimit}}
    </p>
@endif
@if ($obj->upperLimit)
    <p><b>Código: </b>
        {{$obj->upperLimit}}
    </p>
@endif
@if ($obj->dimensions)
    <p><b>Código: </b>
        {{$obj->dimensions}}
    </p>
@endif
@if ($obj->data)
    <p><b>Código: </b>
        {{$obj->data}}
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-SAMPLEDATA===</b>
        </div>
    </div>
@endif