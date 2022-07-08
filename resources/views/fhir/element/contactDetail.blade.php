@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CONTACTDETAIL===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->name))
    <p><b>Nombre:</b>
        {{$obj->name}}
    </p>
@endif
@if (isset($obj->telecom))
    <p><b>Contacto:</b>
        @include('fhir.element.contactPoint', ["obj"=>$obj->telecom])
    </p>
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CONTACTDETAIL===</b>
        </div>
    </div>
@endif