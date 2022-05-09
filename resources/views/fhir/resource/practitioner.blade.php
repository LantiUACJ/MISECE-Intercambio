@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===PRACTITIONER===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col s12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col s6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach>
    </div>
@endif
@if (isset($obj->active))
    <div class="row">
        <div class="col s12">
            Activo
        </div>
        <div class="col s12">
            {{$obj->active?"SI":"NO"}}
        </div>
    </div>
@endif
@if (isset($obj->name))
    <div class="row">
        <div class="col s12">
            Nombre
        </div>
        @foreach ($obj->name as $name)
            <div class="col s6">
                @include('fhir.element.humanName',["obj"=>$name])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->telecom))
    <div class="row">
        <div class="col s12">
            Datos de contacto
        </div>
        @foreach ($obj->telecom as $telecom)
            <div class="col s6">
                @include('fhir.element.contactPoint',["obj"=>$telecom])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->address))
    <div class="row">
        <div class="col s12">
            Dirección
        </div>
        @foreach ($obj->address as $address)
            <div class="col s6">
                @include('fhir.element.address',["obj"=>$address])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->gender))
    <div class="row">
        <div class="col s12">
            Género
        </div>
        <div class="col s12">
            {{str_replace(["male", "female", "unknown", "other"],["hombre", "mujere", "desconocido", "otro"],strtolower($obj->gender))}}
        </div>
    </div>
@endif
@if (isset($obj->birthDate))
    <div class="row">
        <div class="col s12">
            Fecha de nacimiento
        </div>
        <div class="col s12">
            {{$obj->birthDate}}
        </div>
    </div>
@endif
@if (isset($obj->photo))
    <div class="row">
        <div class="col s12">
            Foto
        </div>
        <div class="col s12">
            @include('fhir.element.attachment',["obj"=>$obj->photo])
        </div>
    </div>
@endif
@if (isset($obj->qualification))
    <div class="row">
        <div class="col s12">
            Títulos
        </div>
        @foreach ($obj->qualification as $qualification)
            <div class="row">
                @if (isset($qualification->identifier)))
                    <div class="col s12">
                        Identificador:
                    </div>
                    @foreach ($qualification->identifier as $identifier)
                        <div class="col s6">
                            @include('fhir.element.identificador',["obj"=>$identifier])
                        </div>
                    @endforeach
                @endif
                @if (isset($qualification->code))
                    <div class="col s6">
                        Código <br>
                        @include('fhir.element.codeableConcept',["obj"=>$qualification->code])
                    </div>
                @endif
                @if (isset($qualification->period))
                    <div class="col s6">
                        Periodo <br>
                        @include('fhir.element.period',["obj"=>$qualification->period])
                    </div>
                @endif
                @if (isset($qualification->issuer))
                    <div class="col s6">
                        Certificadora <br>
                        @include('fhir.element.reference',["obj"=>$qualification->issuer])
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->communication))
    <div class="row">
        <div class="col s12">
            Comunicación
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->communication])
        </div>
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-PRACTITIONER===</b>
        </div>
    </div>
@endif