@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===practitionerRole===</b>
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
@if (isset($obj->period))
    <div class="row">
        <div class="col s12">
            Período:
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->period])
        </div>
    </div>
@endif
@if (isset($obj->practitioner))
    <div class="row">
        <div class="col s12">
            Practicante:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->practitioner])
        </div>
    </div>
@endif
@if (isset($obj->organization))
    <div class="row">
        <div class="col s12">
            Organización:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->organization])
        </div>
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col s12">
            Código
        </div>
        @foreach ($obj->code as $code)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$code])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->specialty))
    <div class="row">
        <div class="col s12">
            Especialidad:
        </div>
        @foreach ($obj->specialty as $specialty)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$specialty])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->location))
    <div class="row">
        <div class="col s12">
            Lugar
        </div>
        @foreach ($obj->location as $location)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$location])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->healthcareService))
    <div class="row">
        <div class="col s12">
            Servicio medico:
        </div>
        @foreach ($obj->healthcareService as $healthcareService)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$healthcareService])
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
@if (isset($obj->availableTime))
    <div class="row">
        <div class="col s12">
            Tiempo disponible:
        </div>
        @foreach ($obj->availableTime as $availableTime)
            @if (isset($availableTime->daysOfWeek))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Días de la semana:
                        </div>
                        @foreach ($availableTime->daysOfWeek as $daysOfWeek)
                            <div class="col s12">
                                {{$daysOfWeek}} <!-- mon | tue | wed | thu | fri | sat | sun -->
                            </div>
                        @endforeach
                    </div>    
                </div>
            @endif
            @if (isset($availableTime->allDay))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Disponible siempre: {{$availableTime->allDay?"SI":"NO"}}
                        </div>
                    </div>    
                </div>
            @endif
            @if (isset($availableTime->availableStartTime))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Fecha de inicio de disponibilidad: {{$availableTime->availableStartTime}}
                        </div>
                    </div>    
                </div>
            @endif
            @if (isset($availableTime->availableEndTime))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Fecha de fin de disponibilidad: {{$availableTime->availableEndTime}}
                        </div>
                    </div>    
                </div>
            @endif
        @endforeach
    </div>    
@endif
@if (isset($obj->notAvailable))
    <div class="row">
        <div class="col s12">
            Tiempo disponible:
        </div>
        @foreach ($obj->notAvailable as $notAvailable)
            @if (isset($notAvailable->description))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Descrición: {{$notAvailable->description}}
                        </div>
                    </div>    
                </div>
            @endif
            @if (isset($notAvailable->during))
                <div class="col s12">
                    <div class="row">
                        <div class="col s12">
                            Fecha de inicio de disponibilidad: 
                        </div>
                        <div class="col s12">
                            @include('fhir.element.period',["obj"=>$notAvailable->during])
                        </div>
                    </div>    
                </div>
            @endif
        @endforeach
    </div>    
@endif
@if (isset($obj->availabilityExceptions))
    <div class="row">
        <div class="col s12">
            Practicante:
        </div>
        <div class="col s12">
            {{$obj->availabilityExceptions}}
        </div>
    </div>
@endif
@if (isset($obj->endpoint))
    <div class="row">
        <div class="col s12">
            Punto final:
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
            <b>===practitionerRole===</b>
        </div>
    </div>
@endif