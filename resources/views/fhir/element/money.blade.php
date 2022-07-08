@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===MONEY===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ($obj->value)
    <p><b> Valor: </b>
        {{$obj->value}}
    </p>
@endif
@if ($obj->value)
    <p><b> Divisa: </b>
        {{$obj->value}}
    </p>
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-MONEY===</b>
        </div>
    </div>
@endif