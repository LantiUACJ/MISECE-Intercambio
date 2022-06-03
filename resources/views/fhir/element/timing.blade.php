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
            Identificador
        </div>
        @foreach ($obj->event as $event)
            <div class="col s6">
                {{$event}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->repeat))
    <div class="row">
        <div class="col s12">
            Repetir
        </div>
        <div class="col s12">
            @if (isset($obj->repeat->boundsDuration))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        @include('fhir.element.duration',["obj"=>$obj->repeat->boundsDuration])
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->boundsRange))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        @include('fhir.element.range',["obj"=>$obj->repeat->boundsRange])
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->boundsPeriod))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        @include('fhir.element.period',["obj"=>$obj->repeat->boundsPeriod])
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->count))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->count}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->countMax))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->countMax}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->duration))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->duration}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->durationMax))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->durationMax}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->durationUnit))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->durationUnit}} <!-- // s | min | h | d | wk | mo | a - unit of time (UCUM) -->
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->frequency))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->frequency}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->frequencyMax))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->frequencyMax}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->period))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->period}}
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->periodMax))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->periodMax}} 
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->periodUnit))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->periodUnit}} <!-- // s | min | h | d | wk | mo | a - unit of time (UCUM) -->
                    </div>
                </div>
            @endif
            @if (isset($obj->repeat->dayOfWeek))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    @foreach ($obj->repeat->dayOfWeek as $dayOfWeek)
                        <div class="col s6">
                            {{$dayOfWeek}} <!-- // mon | tue | wed | thu | fri | sat | sun -->
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($obj->repeat->timeOfDay))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    @foreach ($obj->repeat->timeOfDay as $timeOfDay)
                        <div class="col s6">
                            {{$timeOfDay}}
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($obj->repeat->when))
                <div class="row">
                    <div class="col s12">
                        Cuando:
                    </div>
                    @foreach ($obj->repeat->when as $when)
                        <div class="col s6">
                            {{$when}}
                        </div>
                    @endforeach
                </div>
            @endif
            @if (isset($obj->repeat->offset))
                <div class="row">
                    <div class="col s12">
                        Tiempo del día:
                    </div>
                    <div class="col s6">
                        {{$obj->repeat->offset}}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col s12">
            Código
        </div>
        <div class="col s6">
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-TIMING===</b>
        </div>
    </div>
@endif