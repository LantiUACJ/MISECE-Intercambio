@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===practitionerRole===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier) && $obj->identifier)
    <p><b>Identificador</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->active))
    <p><b>Activo</b></p>
    <div class="element">
        {{$obj->active?"SI":"NO"}}
    </div>
@endif
@if (isset($obj->period))
    <p><b>Período:</b></p>
    <div class="element">
        @include('fhir.element.period',["obj"=>$obj->period])
    </div>
@endif
@if (isset($obj->practitioner))
    <p><b>Practicante:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->practitioner])
    </div>
@endif
@if (isset($obj->organization))
    <p><b>Organización:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->organization])
    </div>
@endif
@if (isset($obj->code) && $obj->code)
    <p><b>Código</b></p>
    @foreach ($obj->code as $code)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$code])
        </div>
    @endforeach
@endif
@if (isset($obj->specialty) && $obj->specialty)
    <p><b>Especialidad:</b></p>
    @foreach ($obj->specialty as $specialty)
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$specialty])
        </div>
    @endforeach
@endif
@if (isset($obj->location) && $obj->location)
    <p><b>Lugar</b></p>
    @foreach ($obj->location as $location)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$location])
        </div>
    @endforeach
@endif
@if (isset($obj->healthcareService) && $obj->healthcareService)
    <p><b>Servicio medico:</b></p>
    @foreach ($obj->healthcareService as $healthcareService)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$healthcareService])
        </div>
    @endforeach
@endif
@if (isset($obj->telecom) && $obj->telecom)
    <p><b>Contacto:</b></p>
    @foreach ($obj->telecom as $telecom)
        <div class="element">
            @include('fhir.element.contactPoint',["obj"=>$telecom])
        </div>
    @endforeach
@endif
@if (isset($obj->availableTime) && $obj->availableTime)
    <p><b>Tiempo disponible:</b></p>
    @foreach ($obj->availableTime as $availableTime)
        <div class="element">
            @if (isset($availableTime->daysOfWeek) && $availableTime->daysOfWeek)
                <p><b>Días de la semana:</b></p>
                @foreach ($availableTime->daysOfWeek as $daysOfWeek)
                    <div class="element">
                        {{$daysOfWeek}} <!-- mon | tue | wed | thu | fri | sat | sun -->
                    </div>
                @endforeach
            @endif
            @if (isset($availableTime->allDay))
                <p><b>Disponible siempre:</b> {{$availableTime->allDay?"SI":"NO"}}</p>
            @endif
            @if (isset($availableTime->availableStartTime))
                <p><b>Fecha de inicio de disponibilidad:</b>{{$availableTime->availableStartTime}}</p>
            @endif
            @if (isset($availableTime->availableEndTime))
                <p><b>Fecha de fin de disponibilidad:</b>{{$availableTime->availableEndTime}}</p>
            @endif
        </div>
    @endforeach
@endif
@if (isset($obj->notAvailable) && $obj->notAvailable)
    <p><b>Tiempo disponible:</b></p>
    @foreach ($obj->notAvailable as $notAvailable)
        @if (isset($notAvailable->description))
            <p><b>Descrición:</b>{{$notAvailable->description}}</p>
        @endif
        @if (isset($notAvailable->during))
            <p><b>Fecha de inicio de disponibilidad: </b></p>
            <div class="element">
                @include('fhir.element.period',["obj"=>$notAvailable->during])
            </div>
        @endif
    @endforeach
@endif
@if (isset($obj->availabilityExceptions))
    <p><b>Practicante:</b></p>
    <div class="element">
        {{$obj->availabilityExceptions}}
    </div>
@endif
@if (isset($obj->endpoint) && $obj->endpoint)
    <p><b>Punto final:</b></p>
    @foreach ($obj->endpoint as $endpoint)
        <div class="element">
            @include('fhir.element.reference',["obj"=>$endpoint])
        </div>
    @endforeach
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===practitionerRole===</b>
        </div>
    </div>
@endif