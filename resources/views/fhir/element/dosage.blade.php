@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===DOSAGE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
<div class="element">
    @if (isset($obj->sequence))
        <p><b>sequence:</b></p>
        <div class="element">
            {{$obj->sequence}}
        </div>
    @endif
    @if (isset($obj->text))
        <p><b>Estado:</b></p>
        <div class="element">
            {{$obj->text}}
        </div>
    @endif
    @if (isset($obj->additionalInstruction) && $obj->additionalInstruction)
        <p><b>additionalInstruction:</b></p>
        <div class="element">
            @foreach ($obj->additionalInstruction as $additionalInstruction)
                <p>@include('fhir.element.codeableConcept',["obj"=>$additionalInstruction])</p>
            @endforeach
        </div>
    @endif
    @if (isset($obj->patientInstruction))
        <p><b>Estado:</b></p>
        <div class="element">
            {{$obj->patientInstruction}}
        </div>
    @endif
    @if (isset($obj->timing))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.timing',["obj"=>$obj->timing])
        </div>
    @endif
    @if (isset($obj->asNeededBoolean))
        <p><b>Estado:</b></p>
        <div class="element">
            {{$obj->asNeededBoolean}}
        </div>
    @endif
    @if (isset($obj->asNeededCodeableConcept))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->asNeededCodeableConcept])
        </div>
    @endif
    @if (isset($obj->site))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->site])
        </div>
    @endif
    @if (isset($obj->route))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->route])
        </div>
    @endif
    @if (isset($obj->method))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->method])
        </div>
    @endif
    @if (isset($obj->doseAndRate) && $obj->doseAndRate)
        @foreach ($obj->doseAndRate as $doseAndRate)
            @if (isset($doseAndRate->type))
                <p><b>type:</b></p>
                <div class="element">
                    @include('fhir.element.codeableConcept',["obj"=>$doseAndRate->type])
                </div>
            @endif
            @if (isset($doseAndRate->doseRange))
                <p><b>doseRange:</b></p>
                <div class="element">
                    @include('fhir.element.range',["obj"=>$doseAndRate->doseRange])
                </div>
            @endif
            @if (isset($doseAndRate->doseQuantity))
                <p><b>doseQuantity:</b></p>
                <div class="element">
                    @include('fhir.element.quantity',["obj"=>$doseAndRate->doseQuantity])
                </div>
            @endif
            @if (isset($doseAndRate->rateRatio))
                <p><b>rateRatio:</b></p>
                <div class="element">
                    @include('fhir.element.ratio',["obj"=>$doseAndRate->rateRatio])
                </div>
            @endif
            @if (isset($doseAndRate->rateRange))
                <p><b>rateRange:</b></p>
                <div class="element">
                    @include('fhir.element.range',["obj"=>$doseAndRate->rateRange])
                </div>
            @endif
            @if (isset($doseAndRate->rateQuantity))
                <p><b>rateQuantity:</b></p>
                <div class="element">
                    @include('fhir.element.quantity',["obj"=>$doseAndRate->rateQuantity])
                </div>
            @endif
        @endforeach
    @endif
    @if (isset($obj->maxDosePerPeriod))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.ratio',["obj"=>$obj->maxDosePerPeriod])
        </div>
    @endif
    @if (isset($obj->maxDosePerAdministration))
        <p><b>maxDosePerAdministration:</b></p>
        <div class="element">
            @include('fhir.element.quantity',["obj"=>$obj->maxDosePerAdministration])
        </div>
    @endif
    @if (isset($obj->maxDosePerLifetime))
        <p><b>maxDosePerLifetime:</b></p>
        <div class="element">
            @include('fhir.element.quantity',["obj"=>$obj->maxDosePerLifetime])
        </div>
    @endif
</div>
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-DOSAGE===</b>
        </div>
    </div>
@endif