@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===PRACTITIONER===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <p><b>Identificador:</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->active))
    <p><b>Activo:</b></p>
    <div class="element">
        {{$obj->active?"SI":"NO"}}
    </div>
@endif
@if (isset($obj->name))
    <p><b>Nombre</b></p>
    @foreach ($obj->name as $name)
        <div class="element">
            @include('fhir.element.humanName',["obj"=>$name])
        </div>
    @endforeach
@endif
@if (isset($obj->telecom))
    <p><b>Datos de contacto:</b></p>
    @foreach ($obj->telecom as $telecom)
        <div class="element">
            @include('fhir.element.contactPoint',["obj"=>$telecom])
        </div>
    @endforeach
@endif
@if (isset($obj->address))
    <p><b>Dirección:</b></p>
    @foreach ($obj->address as $address)
        <div class="element">
            @include('fhir.element.address',["obj"=>$address])
        </div>
    @endforeach
@endif
@if (isset($obj->gender))
    <p><b>Género:</b></p>
    <div class="element">
        {{str_replace(["female", "male", "unknown", "other"],["mujere", "hombre", "desconocido", "otro"],strtolower($obj->gender))}}
    </div>
@endif
@if (isset($obj->birthDate))
    <p><b>Fecha de nacimiento:</b></p>
    <div class="element">
        {{$obj->birthDate}}
    </div>
@endif
@if (isset($obj->photo))
    <p><b>Foto:</b></p>
    <div class="element">
        @foreach ($obj->photo as $photo)
            @include('fhir.element.attachment',["obj"=>$photo])
        @endforeach
    </div>
@endif
@if (isset($obj->qualification))
    <p><b>Títulos:</b></p>
    @foreach ($obj->qualification as $qualification)
        @if (isset($qualification->identifier))
            <p><b>Identificador:</b></p>
            @foreach ($qualification->identifier as $identifier)
                <div class="element">
                    @include('fhir.element.identifier',["obj"=>$identifier])
                </div>
            @endforeach
        @endif
        @if (isset($qualification->code))
            <p><b>Código</b></p>
            <div class="element">
                @include('fhir.element.codeableConcept',["obj"=>$qualification->code])
            </div>
        @endif
        @if (isset($qualification->period))
            <p><b>Periodo</b></p>
            <div class="element">
                @include('fhir.element.period',["obj"=>$qualification->period])
            </div>
        @endif
        @if (isset($qualification->issuer))
            <p><b>Certificadora</b></p>
            <div class="element">
                @include('fhir.element.reference',["obj"=>$qualification->issuer])
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->communication))
    <p><b>Comunicación</b></p>
    <div class="element">
        @foreach ($obj->communication as $communication)
            @include('fhir.element.codeableConcept',["obj"=>$communication])
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-PRACTITIONER===</b>
        </div>
    </div>
@endif