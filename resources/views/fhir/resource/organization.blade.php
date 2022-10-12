@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===ORGANIZATION===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])

@if (isset($obj->name))
    <p>Nombre: <b>{{$obj->name}}</b></p>
@endif
@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador:</b></p>
    <div class="element">
        @foreach ($obj->identifier as $identifier)
            <hr>
            @include('fhir.element.identifier',["obj"=>$identifier])
        @endforeach
    </div>
@endif
@if (isset($obj->active) && env("test", false))
    Activo {{$obj->active?"SI":"NO"}}
@endif
@if (isset($obj->type) && $obj->type)
    <p><b>Tipo:</b></p>
    <div class="element">
        @foreach ($obj->type as $type)
            @include('fhir.element.codeableConcept',["obj"=>$type]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->alias) && $obj->alias)
    <p><b>Alias:</b></p>
    <div class="element">
        @foreach ($obj->alias as $alias)
            {{$alias}} <br>
        @endforeach
    </div>
@endif
@if (isset($obj->telecom) && $obj->telecom)
    <p><b>Comunicación:</b></p>
    <div class="element">
        @foreach ($obj->telecom as $telecom)
            @include('fhir.element.contactPoint',["obj"=>$telecom]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->address) && $obj->address)
    <p><b>Dirección:</b></p>
    <div class="element">
        @foreach ($obj->address as $address)
            <hr>
            @include('fhir.element.address',["obj"=>$address]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <p><b>Parte de:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->partOf])
    </div>
@endif
@if (isset($obj->contact) && $obj->contact)
    <p><b>Contacto:</b></p>
    @foreach ($obj->contact as $contact)
        <div class="element">
            @if (isset($contact->purpose))
                <p><b>Tipo de contacto: </b> @include('fhir.element.codeableConcept',["obj"=>$contact->purpose]) </p>
            @endif
            @if (isset($contact->name))
                <p><b>Nombre: </b> @include('fhir.element.humanName',["obj"=>$contact->name])</p>
            @endif
            @if (isset($contact->telecom) && $contact->telecom)
                <p><b>Datos de contacto: </b></p>
                <div class="element">
                    @foreach ($contact->telecom as $telecom)
                        * @include('fhir.element.contactPoint',["obj"=>$telecom]) <br>
                    @endforeach
                </div>
            @endif
            @if (isset($contact->address))
                <p><b>Dirección: </b></p>
                <div class="element">
                    @include('fhir.element.address',["obj"=>$contact->address])
                </div>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->endpoint) && $obj->endpoint)
    <p><b>Punto final:</b></p>
    <div class="element">
        @foreach ($obj->endpoint as $endpoint)
            @include('fhir.element.reference',["obj"=>$endpoint])
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-ORGANIZATION===</b>
        </div>
    </div>
@endif