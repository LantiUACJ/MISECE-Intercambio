@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===ORGANIZATION===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->active))
    <div class="row">
        <div class="col-12">
            Activo
            {{$obj->active?"SI":"NO"}}
        </div>
    </div>
@endif
@if (isset($obj->type))
    <div class="row">
        <div class="col-12">
            Tipo
        </div>
        @foreach ($obj->type as $type)
            <div class="col-6">
                @include('fhir.element.codableconcept',["obj"=>$type])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->name))
    <div class="row">
        <div class="col-12">
            Nombre
            {{$obj->name}}
        </div>
    </div>
@endif
@if (isset($obj->alias))
    <div class="row">
        <div class="col-12">
            Alias
        </div>
        @foreach ($obj->alias as $alias)
            <div class="col-6">
                {{$alias}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->telecom))
    <div class="row">
        <div class="col-12">
            Tipo
        </div>
        @foreach ($obj->telecom as $telecom)
            <div class="col-6">
                @include('fhir.element.contactPoint',["obj"=>$telecom])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->address))
    <div class="row">
        <div class="col-12">
            Dirección
        </div>
        @foreach ($obj->address as $address)
            <div class="col-6">
                @include('fhir.element.address',["obj"=>$address])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col-12">
            Parte de
            @include('fhir.element.reference',["obj"=>$obj->partOf])
        </div>
    </div>
@endif
@if (isset($obj->contact))
    <div class="row">
        <div class="col-12">
            Contacto:
        </div>
    </div>
    @foreach ($obj->contact as $contact)
        <div class="row">
            @if (isset($contact->purpose))
                <div class="col-6">
                    Proposito: <br>
                    @include('fhir.element.codeableConcept',["obj"=>$contact->purpose])
                </div>
            @endif
            @if (isset($contact->name))
                <div class="col-6">
                    Nombre: <br>
                    @include('fhir.element.humanName',["obj"=>$contact->name])
                </div>
            @endif
            @if (isset($contact->telecom))
                <div class="col-6">
                    Datos de contacto: <br>
                    @include('fhir.element.contactPoint',["obj"=>$contact->telecom])
                </div>
            @endif
            @if (isset($contact->address))
                <div class="col-6">
                    Dirección: <br>
                    @include('fhir.element.codeableConcept',["obj"=>$contact->address])
                </div>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->endpoint))
    <div class="row">
        <div class="col-12">
            Punto final
        </div>
        @foreach ($obj->endpoint as $endpoint)
            <div class="col-6">
                @include('fhir.element.reference',["obj"=>$endpoint])
            </div>
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-ORGANIZATION===</b>
        </div>
    </div>
@endif