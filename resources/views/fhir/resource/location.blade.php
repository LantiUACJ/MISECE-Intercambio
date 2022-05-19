@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
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
        @endforeach
    </div>    
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["active", "suspended","inactive"],
                                   ["active", "suspended","inactive"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->operationalStatus))
    <div class="row">
        <div class="col s12">
            Estado operacional:
        </div>
        <div class="col s6">
            @include('fhir.element.coding',["obj"=>$obj->operationalStatus])
        </div>
    </div>    
@endif
@if (isset($obj->name))
    <div class="row">
        <div class="col s12">
            Nombre: {{ $obj->name }}
        </div>
    </div>
@endif
@if (isset($obj->alias))
    <div class="row">
        <div class="col s12">
            Alias:
        </div>
        <div class="col s12">
            @foreach ($obj->alias as $alias)
                {{ $alias }}
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->description))
    <div class="row">
        <div class="col s12">
            Descripcion: {{ $obj->description }}
        </div>
    </div>
@endif
@if (isset($obj->mode))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["instance", "kind"],
                                   ["instance", "kind"], strtolower($obj->mode))}}
        </div>
    </div>
@endif
@if (isset($obj->type))
    <div class="row">
        <div class="col s12">
            Tipo:
        </div>
        @foreach ($obj->type as $type)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$type])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->telecom))
    <div class="row">
        <div class="col s12">
            Contacto:
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
            Direccion
        </div>
        <div class="col s6">
            @include('fhir.element.address',["obj"=>$obj->address])
        </div>
    </div>    
@endif
@if (isset($obj->physicalType))
    <div class="row">
        <div class="col s12">
            Tipo física:
        </div>
        <div class="col s6">
            @include('fhir.element.codeableConcept',["obj"=>$obj->physicalType])
        </div>
    </div>    
@endif
@if (isset($obj->position))
    <div class="row">
        <div class="col s12">
            houras de operación:
        </div>
        <div class="col s12">
            @if (isset($obj->position->longitude))
                <div class="row">
                    <div class="col s12">
                        Longitud:
                    </div>
                    <div class="col s6">
                        {{$obj->position->longitude}}
                    </div>
                </div>    
            @endif
        </div>
        <div class="col s12">
            @if (isset($obj->position->latitude))
                <div class="row">
                    <div class="col s12">
                        Latitud:
                    </div>
                    <div class="col s6">
                        {{$obj->position->latitude}}
                    </div>
                </div>    
            @endif
        </div>
        <div class="col s12">
            @if (isset($obj->position->altitude))
                <div class="row">
                    <div class="col s12">
                        Altitud:
                    </div>
                    <div class="col s6">
                        {{$obj->position->altitude}}
                    </div>
                </div>    
            @endif
        </div>
    </div>    
@endif
@if (isset($obj->managingOrganization))
    <div class="row">
        <div class="col s12">
            Tipo física:
        </div>
        <div class="col s6">
            @include('fhir.element.reference',["obj"=>$obj->managingOrganization])
        </div>
    </div>    
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col s12">
            Tipo física:
        </div>
        <div class="col s6">
            @include('fhir.element.reference',["obj"=>$obj->partOf])
        </div>
    </div>    
@endif
@if (isset($obj->hoursOfOperation))
    <div class="row">
        <div class="col s12">
            houras de operación:
        </div>
        @foreach ($obj->hoursOfOperation as $hoursOfOperation)
            <div class="col s12">
                @if (isset($hoursOfOperation->daysOfWeek))
                    <div class="row">
                        <div class="col s12">
                            Días de la semana:
                        </div>
                        @foreach ($hoursOfOperation->daysOfWeek as $daysOfWeek)
                            <div class="col s6">
                                {{$daysOfWeek}} <!-- mon | tue | wed | thu | fri | sat | sun -->
                            </div>
                        @endforeach
                    </div>    
                @endif
                @if (isset($hoursOfOperation->allDay))
                    <div class="row">
                        <div class="col s12">
                            Todo el día:
                        </div>
                        <div class="col s6">
                            {{$hoursOfOperation->allDay?"SI":"NO"}}
                        </div>
                    </div>    
                @endif
                @if (isset($hoursOfOperation->openingTime))
                    <div class="row">
                        <div class="col s12">
                            Fecha de Apertura:
                        </div>
                        <div class="col s6">
                            {{$hoursOfOperation->openingTime}}
                        </div>
                    </div>    
                @endif
                @if (isset($hoursOfOperation->closingTime))
                    <div class="row">
                        <div class="col s12">
                            Fecha de cierre:
                        </div>
                        <div class="col s6">
                            {{$hoursOfOperation->closingTime}}
                        </div>
                    </div>    
                @endif
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->availabilityExceptions))
    <div class="row">
        <div class="col s12">
            Descripción de excepciones disponibles: {{ $obj->availabilityExceptions }}
        </div>
    </div>
@endif
@if (isset($obj->endpoint))
    <div class="row">
        <div class="col s12">
            Tipo
        </div>
        @foreach ($obj->endpoint as $endpoint)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$endpoint])
            </div>
        @endforeach
    </div>    
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===location===</b>
        </div>
    </div>
@endif