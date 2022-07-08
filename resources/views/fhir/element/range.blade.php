@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===RANGE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ($obj->low)
    <p><b>Mínimo: </b>
        @include('fhir.element.quantity', ["obj"=>$obj->low])
    </p>
@endif
@if ($obj->high)
    <p><b>Máximo: </b>
        @include('fhir.element.quantity', ["obj"=>$obj->high])
    </p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-RANGE===</b>
        </div>
    </div>
@endif