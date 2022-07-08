@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
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
@if (isset($obj->status))
    <p><b>Estado:</b>
            {{ str_replace(
            ["active", "suspended","inactive"],
            ["active", "suspended","inactive"], strtolower($obj->status))}}
    </p>
@endif
@if (isset($obj->operationalStatus))
    <p><b>Estado operacional:</b></p>
    <div class="element">
        @include('fhir.element.coding',["obj"=>$obj->operationalStatus])
    </div>
@endif
@if (isset($obj->name))
    <p><b>Nombre: </b>
        {{ $obj->name }}
    </p>
@endif
@if (isset($obj->alias))
    <p><b>Alias:</b></p>
    @foreach ($obj->alias as $alias)
        <div class="element">
            {{ $alias }}
        </div>
    @endforeach
@endif
@if (isset($obj->description))
    <p><b>Descripcion: </b>
        {{ $obj->description }}
    </p>
            
@endif
@if (isset($obj->mode))
    <p><b>Estado:</b>
        {{ str_replace(
            ["instance", "kind"],
            ["instance", "kind"], strtolower($obj->mode))}}
    </p>
@endif
@if (isset($obj->type))
    <p><b>Tipo:</b></p>
    @foreach ($obj->type as $type)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$type])
        </div>
    @endforeach
@endif
@if (isset($obj->telecom))
    <p><b>Contacto:</b></p>
    @foreach ($obj->telecom as $telecom)
        <div class="element">
            @include('fhir.element.contactPoint',["obj"=>$telecom])
        </div>
    @endforeach
@endif
@if (isset($obj->address))
    <p><b>Direccion:</b></p>
    <div class="element">
        @include('fhir.element.address',["obj"=>$obj->address])
    </div>    
@endif
@if (isset($obj->physicalType))
    <p><b>Tipo física:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->physicalType])
    </div>    
@endif
@if (isset($obj->position))
    <p><b>houras de operación:</b></p>
    <div class="element">
        @if (isset($obj->position->longitude))
            <p><b>Longitud:</b></p>
            <div class="element">
                {{$obj->position->longitude}}
            </div>
        @endif
    </div>
    <div class="element">
        @if (isset($obj->position->latitude))
            <p><b>Latitud:</b></p>
            <div class="element">
                {{$obj->position->latitude}}
            </div>
        @endif
    </div>
    <div class="element">
        @if (isset($obj->position->altitude))
            <p><b>Altitud:</b></p>
            <div class="element">
                {{$obj->position->altitude}}
            </div>    
        @endif
    </div>
@endif
@if (isset($obj->managingOrganization))
    <p><b>Tipo física:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->managingOrganization])
    </div>    
@endif
@if (isset($obj->partOf))
    <p><b>Tipo física:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->partOf])
    </div>    
@endif
@if (isset($obj->hoursOfOperation))
    <p><b>houras de operación:</b></p>
    @foreach ($obj->hoursOfOperation as $hoursOfOperation)
        <div class="element">
            @if (isset($hoursOfOperation->daysOfWeek))
                <p><b>Días de la semana:</b></p>
                @foreach ($hoursOfOperation->daysOfWeek as $daysOfWeek)
                    <div class="element">
                        {{str_replace(
                            ["mon","tue","wed","thu","fri","sat","sun"],
                            ["mon","tue","wed","thu","fri","sat","sun"],$daysOfWeek)}}
                    </div>
                @endforeach
            @endif
            @if (isset($hoursOfOperation->allDay))
                <p><b>Todo el día:</b></p>
                <div class="element">
                    {{$hoursOfOperation->allDay?"SI":"NO"}}
                </div>    
            @endif
            @if (isset($hoursOfOperation->openingTime))
                <p><b>Fecha de Apertura:</b></p>
                <div class="element">
                    {{$hoursOfOperation->openingTime}}
                </div>    
            @endif
            @if (isset($hoursOfOperation->closingTime))
                <p><b>Fecha de cierre:</b></p>
                <div class="element">
                    {{$hoursOfOperation->closingTime}}
                </div>    
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->availabilityExceptions))
    <p><b>Descripción de excepciones disponibles:</b>
        {{ $obj->availabilityExceptions }}
    </p>
@endif
@if (isset($obj->endpoint))
    <p><b>Tipo:</b></p>
    @foreach ($obj->endpoint as $endpoint)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$endpoint])
        </div>
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
        </div>
    </div>
@endif