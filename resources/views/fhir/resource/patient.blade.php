@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===PATIENT===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj, "excludeResource"=>true])
<div class="element">
    @if (isset($obj->name))
        <p><b>Nombre(s):</b></p>
        <div class="element">
            @foreach ($obj->name as $name)
                <p>@include('fhir.element.humanName',["obj"=>$name])</p>
            @endforeach
        </div>
    @endif
    @if (isset($obj->active))
        El paciente esta {{$obj->active?"activo":"inactivo"}} en el sistema.
    @endif
    @if (isset($obj->gender))
        Tiene el género de <b><a class="tooltipped" data-position="top" href="#" data-toggle="tooltip" data-tooltip="Snomed:1384173/female">{{str_replace(["female", "male", "unknown", "other"],["femenino", "masculino", "desconocido", "otro"],strtolower($obj->gender))}}</a></b>.
    @endif
    @if (isset($obj->birthDate))
        La fecha de nacimiento es <b>{{$obj->birthDate}}</b>.
    @endif
    @if (isset($obj->deceasedBoolean) && $obj->deceasedBoolean)
        El paciente fue categorizado como fallecido. 
        @if (isset($obj->deceasedDateTime))
            con fecha de defunción: {{$obj->deceasedDateTime}}
        @endif
    @endif

    @if (isset($obj->multipleBirthBoolean) || isset($obj->multipleBirthInteger))
        El paciente estuvo en un nacimiento múltiple.
        @if (isset($obj->multipleBirthInteger))
            El parto múltiple fue de {{$obj->multipleBirthInteger}}.
        @endif
    @endif

    @if (isset($obj->telecom) && $obj->telecom)
        <p><b>Datos de contacto:</b></p>    
        @foreach ($obj->telecom as $telecom)
            <div class="element">
                * @include('fhir.element.contactPoint',["obj"=>$telecom])
            </div>
        @endforeach
    @endif
    @if (isset($obj->address))
        <p><b>Dirección:</b></p>
        <div class="element">
            @foreach ($obj->address as $address)
                @include('fhir.element.address',["obj"=>$address])
            @endforeach
        </div>
    @endif
    @if (isset($obj->maritalStatus))
        <p><b>Estado marital:</b></p>
        @include('fhir.element.codeableConcept',["obj"=>$obj->maritalStatus])
    @endif
    @if (isset($obj->photo))
        <p>Foto</p>
        @include('fhir.element.attachment',["obj"=>$obj->photo])
    @endif
    @if (isset($obj->contact) && $obj->contact)
        <p><b>Contactos del paciente:</b></p>
        <div class="element">
            @foreach ($obj->contact as $contact)
                @if (isset($contact->name))
                    <p>Nombre: </p>
                    <div class="element">
                        <p>@include('fhir.element.humanName',["obj"=>$contact->name])</p>
                    </div>
                @endif
                @if (isset($contact->relationship))
                    @foreach ($contact->relationship as $relationship)
                        Relación: 
                        <div class="element">
                            <p>@include('fhir.element.codeableConcept',["obj"=>$relationship])</p>
                        </div>
                    @endforeach
                @endif
                @if (isset($contact->telecom))
                    @foreach ($contact->telecom as $telecom)
                        Datos de contacto:
                        <div class="element">
                            @include('fhir.element.contactPoint',["obj"=>$telecom])
                        </div>
                    @endforeach
                @endif
                @if (isset($contact->address))
                    Dirección:
                    <div class="element">
                        @include('fhir.element.address',["obj"=>$contact->address])
                    </div>
                @endif
                @if (isset($contact->gender))
                    Género del contacto: <b>{{str_replace(["female", "male", "unknown", "other"],["femenino", "masculino", "desconocido", "otro"],strtolower($contact->gender))}}</b>
                @endif
                @if (isset($contact->organization))
                    <p>Organización:</p>
                    <div class="element">
                        @include('fhir.element.reference',["obj"=>$contact->organization])
                    </div>
                @endif
                @if (isset($contact->period))
                    Periodo
                    <div class="element">
                        @include('fhir.element.period',["obj"=>$contact->period])
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    @if (isset($obj->communication) && $obj->communication)
        <p><b>Comunicación:</b></p>
        @foreach ($obj->communication as $communication)
            @if (isset($communication->language))
                El paciente habla @include('fhir.element.codeableConcept',["obj"=>$communication->language])
            @endif
            @if (isset($communication->preferred) && $communication->preferred)
                , el cual es su lenguaje preferido.
            @else
                .
            @endif
            <br>
        @endforeach
    @endif
    @if (isset($obj->generalPractitioner))
        @foreach ($obj->generalPractitioner as $generalPractitioner)
            <p><b>Médico</b></p>
            @include('fhir.element.reference',["obj"=>$generalPractitioner])
        @endforeach
    @endif
    @if (isset($obj->managingOrganization))
        <p><b>Organización administradora:</b></p>
        @include('fhir.element.reference',["obj"=>$obj->managingOrganization])
    @endif
    @if (isset($obj->link))
        @foreach ($obj->link as $link)
            <!--replaced-by | replaces | refer | seealso-->
            Otro @include('fhir.element.reference',["obj"=>$link->other])
            Tipo {{$link}}
        @endforeach
    @endif
    @if (isset($obj->identifier))
        <p><b>Identificadores:</b></p>
        <div class="element">
            @foreach ($obj->identifier as $identifier)
                @include('fhir.element.identifier',["obj"=>$identifier])
                <br>
            @endforeach
        </div>
    @endif
</div>
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-PATIENT===</b>
        </div>
    </div>
@endif