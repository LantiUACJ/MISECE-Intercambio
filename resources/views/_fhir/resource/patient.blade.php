<div class="row">
    @if (isset($obj->name))
        <div class="col-12">
            @foreach ($obj->name as $name)
                @include('_fhir.element.humanName',["obj"=>$name])
            @endforeach
        </div>
    @endif
</div>
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-12">
            Identificadores:
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-6">
                @include('_fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
<div class="row">
    @if (isset($obj->active))
        <div class="col-3">Paciente {{$obj->active?"activo":"no activo"}}</div>
    @endif
    @if (isset($obj->gender))
        <div class="col-3"><b>Género:</b> 
            <a href="#" data-toggle="tooltip" title="Snomed:1384173/female">
                {{str_replace(["female", "male", "unknown", "other"],["mujer", "hombre", "desconocido", "otro"],strtolower($obj->gender))}}
            </a>
        </div>

    @endif
    @if (isset($obj->birthDate))
        <div class="col-3"><b>Fecha de nacimiento:</b><br> {{$obj->birthDate}}</div>
    @endif
    @if (isset($obj->deceasedBoolean))
        <div class="col-3"><b>Estado:</b>{{$obj->deceasedBoolean?"Difunto":"Vivo"}}</div>
    @endif
    @if (isset($obj->deceasedDateTime))
        <div class="col-3"><b>Fecha de defunción:</b> {{$obj->deceasedDateTime}}</div>
    @endif
    @if (isset($obj->multipleBirthBoolean))
        <div class="col-3"><b>Nacimiento múltiple:</b> {{$obj->multipleBirthBoolean?"SI":"NO"}}</div>
    @endif
    @if (isset($obj->multipleBirthInteger))
        <div class="col-3"><b>Nacimiento múltiple:</b>{{$obj->multipleBirthInteger}}</div>
    @endif
</div>
@if (isset($obj->telecom))
    <div class="row">
        <div class="col-12">
            <b>Datos de contacto:</b>
        </div>
        <div class="col-6">
            @foreach ($obj->telecom as $telecom)
                @include('fhir.element.contactPoint',["obj"=>$telecom])
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->address))
    <div class="row">
        <div class="col-2">Dirección:</div>
        <div class="col-10">
            <div class="row">
                @foreach ($obj->address as $address)
                    @if (sizeof($obj->address) > 1)
                        <div class="col-6">
                    @else
                        <div class="col-12">
                    @endif
                        @include('fhir.element.address',["obj"=>$address])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if (isset($obj->maritalStatus))
    <div class="row">
        <div class="col-2">
            Estado marital: 
        </div>
        <div class="col-10">
            @include('fhir.element.codeableConcept',["obj"=>$obj->maritalStatus])
        </div>
    </div>
@endif

@if (isset($obj->photo))
    Foto
    @include('fhir.element.attachment',["obj"=>$obj->photo])
@endif
@if (isset($obj->contact))
    Persona para contacto
    @foreach ($obj->contact as $contact)
        @if (isset($contact->relationship))
            @foreach ($contact->relationship as $relationship)
                Relación
                @include('fhir.element.codeableConcept',["obj"=>$relationship])
            @endforeach
        @endif
        @if (isset($contact->name))
            Nombre
            @include('fhir.element.humanName',["obj"=>$contact->name])
        @endif
        @if (isset($contact->telecom))
            @foreach ($contact->telecom as $telecom)
                Datos de contacto
                @include('fhir.element.contactPoint',["obj"=>$telecom])
            @endforeach
        @endif
        @if (isset($contact->address))
            Dirección
            @include('fhir.element.address',["obj"=>$contact->address])
        @endif
        @if (isset($contact->gender))
            <div class="col-4"><b>Género:</b> {{str_replace(["male", "female", "unknown", "other"],["hombre", "mujere", "desconocido", "otro"],strtolower($contact->gender))}}</div>
        @endif
        @if (isset($contact->organization))
            Organización
            @include('fhir.element.reference',["obj"=>$contact->organization])
        @endif
        @if (isset($contact->period))
            Periodo
            @include('fhir.element.period',["obj"=>$contact->period])
        @endif
    @endforeach
@endif
@if (isset($obj->communication))
    <div class="row">
        <div class="col-12">
            <b>Comunicación:</b>
        </div>
    </div>
    @foreach ($obj->communication as $communication)
        <div class="row">
            @if (isset($communication->language))
                <div class="col-3">
                    Lenguaje:
                </div>
                <div class="col-9">
                    @include('fhir.element.codeableConcept',["obj"=>$communication->language])
                </div>
            @endif
            @if (isset($communication->preferred))
                <div class="col-12">
                    Preferido
                    {{$communication->preferred?"SI":"NO"}}
                </div>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->generalPractitioner))
    @foreach ($obj->generalPractitioner as $generalPractitioner)
        Médico
        @include('fhir.element.reference',["obj"=>$generalPractitioner])
    @endforeach
@endif
@if (isset($obj->managingOrganization))
    Organización administradora
    @include('fhir.element.reference',["obj"=>$obj->managingOrganization])
@endif
@if (isset($obj->link))
    @foreach ($obj->link as $link)
        replaced-by | replaces | refer | seealso
        Otro @include('fhir.element.reference',["obj"=>$link->other])
        Tipo {{$link}}
    @endforeach
@endif