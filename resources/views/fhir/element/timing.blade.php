@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===TIMING===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->event))
    <div class="row">
        <div class="col s12">
            Evento:
        </div>
        @foreach ($obj->event as $event)
            <div class="element">
                {{$event}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->repeat))
    <b>Repetir:</b>
    @if (isset($obj->repeat->boundsDuration) || isset($obj->repeat->boundsRange) || isset($obj->repeat->boundsPeriod))
        @if (isset($obj->repeat->boundsDuration))
            <div class="element">
                @include('fhir.element.duration',["obj"=>$obj->repeat->boundsDuration])
            </div>
        @endif
        @if (isset($obj->repeat->boundsRange))
            <div class="element">
                @include('fhir.element.range',["obj"=>$obj->repeat->boundsRange])
            </div>
        @endif
        @if (isset($obj->repeat->boundsPeriod))
            en las fechas: @include('fhir.element.period',["obj"=>$obj->repeat->boundsPeriod])
        @endif
    @endif
    @if (isset($obj->repeat->count))
        <p><b>Cantidad:</b></p>
        <div class="element">
            {{$obj->repeat->count}}
        </div>
    @endif
    @if (isset($obj->repeat->countMax))
        <p><b>Con un máximo de:</b></p>
        <div class="element">
            {{$obj->repeat->countMax}}
        </div>
    @endif
    @if (isset($obj->repeat->duration))
        <p><b>Duración:</b></p>
        <div class="element">
            {{$obj->repeat->duration}}
        </div>
    @endif
    @if (isset($obj->repeat->durationMax))
        <p><b>Duración máxima:</b></p>
        <div class="element">
            {{$obj->repeat->durationMax}}
        </div>
    @endif
    @if (isset($obj->repeat->durationUnit))
        <p><b>Unidad:</b></p>
        <div class="element">
            {{$obj->repeat->durationUnit}} <!-- // s | min | h | d | wk | mo | a - unit of time (UCUM) -->
        </div>
    @endif
    @if (isset($obj->repeat->frequency))
        {{$obj->repeat->frequency}} {{$obj->repeat->frequency > 1?"veces":"vez"}}
    @endif
    @if (isset($obj->repeat->frequencyMax))
        <div class="element">
            hasta un máximo de {{$obj->repeat->frequencyMax}} {{$obj->repeat->frequencyMax>1?"veces":"vez"}}
        </div>
    @endif
    @if (isset($obj->repeat->period))
        cada {{$obj->repeat->period}}
    @endif
    @if (isset($obj->repeat->periodMax))
        hasta un máximo de {{$obj->repeat->periodMax}}
    @endif
    @if (isset($obj->repeat->periodUnit))
        {{\App\Tools\Replace::change(
            ['s', 'a', 'h', 'd', 'min', 'wk', 'mo'],
            ['segundo(s)', 'año(s)', 'hora(s)', 'día(s)', 'minuto(s)', 'semana(s)', 'mes(es)'], 
            $obj->repeat->periodUnit)}}
        <!-- 
            s	second	second
            min	minute	minute
            h	hour	hour
            d	day	day
            wk	week	week
            mo	month	month
            a	year	year
        -->
    @endif
    @if (isset($obj->repeat->dayOfWeek))
        <p><b>Día de la semana:</b></p>
        <div class="element">
            @foreach ($obj->repeat->dayOfWeek as $dayOfWeek)
                {{$dayOfWeek}} <!-- // mon | tue | wed | thu | fri | sat | sun -->
            @endforeach
        </div>
    @endif
    @if (isset($obj->repeat->timeOfDay))
        <p><b>Tiempo del día:</b></p>
        <div class="element">
            @foreach ($obj->repeat->timeOfDay as $timeOfDay)
                {{$timeOfDay}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->repeat->when))
        <p><b>Cuando:</b></p>
        <div class="element">
            @foreach ($obj->repeat->when as $when)
                {{$when}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->repeat->offset))
        <p><b>Minutos del evento:</b></p>
        <div class="element">
            {{$obj->repeat->offset}}
        </div>
    @endif
@endif
@if (isset($obj->code))
    <p><b>Código:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-TIMING===</b>
        </div>
    </div>
@endif