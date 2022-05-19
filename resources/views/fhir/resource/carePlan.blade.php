@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===carePlan===</b>
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
@if (isset($obj->instantiatesCanonical))
    <div class="row">
        <div class="col s12">
            Instancia
        </div>
        @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
            <div class="col s6">
                {{$instantiatesCanonical}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->instantiatesUri))
    <div class="row">
        <div class="col s12">
            Instancia
        </div>
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            <div class="col s6">
                {{$instantiatesUri}}
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn))
    <div class="row">
        <div class="col s12">
            Basado en
        </div>
        @foreach ($obj->basedOn as $basedOn)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$basedOn])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->replaces))
    <div class="row">
        <div class="col s12">
            Remplaza:
        </div>
        @foreach ($obj->replaces as $replaces)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$replaces])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <div class="row">
        <div class="col s12">
            Parte de:
        </div>
        @foreach ($obj->partOf as $partOf)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$partOf])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"],
                                   ["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->intent))
    <div class="row">
        <div class="col s12">
            Propósito: {{ str_replace(["proposal", "plan","order","option"],
                                      ["proposal", "plan","order","option"], strtolower($obj->intent))}}
        </div>
    </div>
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col s12">
            Categoría:
        </div>
        @foreach ($obj->category as $category)
            <div class="col s12">
                @include('fhir.element.codeableConcept',["obj"=>$category])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->title))
    <div class="row">
        <div class="col s12">
            Título: {{ $obj->title }}
        </div>
    </div>
@endif
@if (isset($obj->description))
    <div class="row">
        <div class="col s12">
            Descripción: {{ $obj->description }}
        </div>
    </div>
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Paciente:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col s12">
            Visita
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->period))
    <div class="row">
        <div class="col s12">
            Período
        </div>
        <div class="col s12">
            @include('fhir.element.period',["obj"=>$obj->period])
        </div>
    </div>
@endif
@if (isset($obj->created))
    <div class="row">
        <div class="col s12">
            Creado en: {{ $obj->created }}
        </div>
    </div>
@endif
@if (isset($obj->author))
    <div class="row">
        <div class="col s12">
            Autor:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->author])
        </div>
    </div>
@endif
@if (isset($obj->contributor))
    <div class="row">
        <div class="col s12">
            Colaboradores:
        </div>
        @foreach ($obj->contributor as $contributor)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$contributor])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->careTeam))
    <div class="row">
        <div class="col s12">
            Equipo:
        </div>
        @foreach ($obj->careTeam as $careTeam)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$careTeam])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->addresses))
    <div class="row">
        <div class="col s12">
            Problemas a tratar:
        </div>
        @foreach ($obj->addresses as $addresses)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$addresses])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->supportingInfo))
    <div class="row">
        <div class="col s12">
            Información de soporte:
        </div>
        @foreach ($obj->supportingInfo as $supportingInfo)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$supportingInfo])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->goal))
    <div class="row">
        <div class="col s12">
            Meta:
        </div>
        @foreach ($obj->goal as $goal)
            <div class="col s12">
                @include('fhir.element.reference',["obj"=>$goal])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->activity))
    <div class="row">
        <div class="col s12">
            Actividad:
        </div>
        <div class="col s12">
            @foreach ($obj->activity as $activity)
                @if (isset($activity->outcomeCodeableConcept))
                    <div class="row">
                        <div class="col s12">
                            Resultado de la actividad:
                        </div>
                        @foreach ($activity->outcomeCodeableConcept as $outcomeCodeableConcept)
                            <div class="col s12">
                                @include('fhir.element.codebaleConcept',["obj"=>$outcomeCodeableConcept])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($activity->outcomeReference))
                    <div class="row">
                        <div class="col s12">
                            Referencia del resultado de la actividad:
                        </div>
                        @foreach ($activity->outcomeReference as $outcomeReference)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$outcomeReference])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($activity->progress))
                    <div class="row">
                        <div class="col s12">
                            Proceso:
                        </div>
                        @foreach ($activity->progress as $progress)
                            <div class="col s12">
                                @include('fhir.element.annotation',["obj"=>$progress])
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (isset($activity->reference))
                    <div class="row">
                        <div class="col s12">
                            Referencia:
                        </div>
                        <div class="col s12">
                            @include('fhir.element.reference',["obj"=>$activity->reference])
                        </div>
                    </div>
                @endif
                @if (isset($activity->detail))
                    <div class="row">
                        <div class="col s12">
                            Detalle de la actividad:
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->kind))
                                <div class="row">
                                    <div class="col s12">
                                        Tipo:
                                    </div>
                                    <div class="col s12">
                                        {{ str_replace(
                                            ["Appointment","CommunicationRequest","DeviceRequest","MedicationRequest","NutritionOrder","Task","ServiceRequest","VisionPrescription"],
                                            ["Appointment","CommunicationRequest","DeviceRequest","MedicationRequest","NutritionOrder","Task","ServiceRequest","VisionPrescription"],
                                            $activity->detail->kind
                                        ) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->instantiatesCanonical))
                                <div class="row">
                                    <div class="col s12">
                                        Instancia:
                                    </div>
                                    @foreach ($activity->detail->instantiatesCanonical as $instantiatesCanonical)
                                        <div class="col s12">
                                            {{$instantiatesCanonical}}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->instantiatesUri))
                                <div class="row">
                                    <div class="col s12">
                                        Instancian:
                                    </div>
                                    @foreach ($activity->detail->instantiatesUri as $instantiatesUri)
                                        <div class="col s12">
                                            {{dd($instantiatesUri)}}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->code))
                                <div class="row">
                                    <div class="col s12">
                                        Código:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.codeableConcept',["obj"=>$activity->detail->code])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->reasonCode))
                                <div class="row">
                                    <div class="col s12">
                                        Código de Razón:
                                    </div>
                                    @foreach ($activity->detail->reasonCode as $reasonCode)
                                        <div class="col s12">
                                            @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->reasonReference))
                                <div class="row">
                                    <div class="col s12">
                                        Referencia de la razón:
                                    </div>
                                    @foreach ($activity->detail->reasonReference as $reasonReference)
                                        <div class="col s12">
                                            @include('fhir.element.codeableConcept',["obj"=>$reasonReference])
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->goal))
                                <div class="row">
                                    <div class="col s12">
                                        Referencia de la meta:
                                    </div>
                                    @foreach ($activity->detail->goal as $goal)
                                        <div class="col s12">
                                            @include('fhir.element.reference',["obj"=>$goal])
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->status))
                                <div class="row">
                                    <div class="col s12">
                                        Estado:
                                    </div>
                                    <div class="col s12">
                                        {{ str_replace(
                                            ["not-started","scheduled","in-progress","on-hold","completed","cancelled","stopped","unknown","entered-in-error"],
                                            ["not-started","scheduled","in-progress","on-hold","completed","cancelled","stopped","unknown","entered-in-error"],
                                            $activity->detail->status
                                        ) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->statusReason))
                                <div class="row">
                                    <div class="col s12">
                                        Razón del estado:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.codeableConcept',["obj"=>$activity->detail->statusReason])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->doNotPerform))
                                <div class="row">
                                    <div class="col s12">
                                        Prohibido realizar:
                                    </div>
                                    <div class="col s12">
                                        {{$activity->detail->doNotPerform?"SI":"NO"}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->scheduledTiming))
                                <div class="row">
                                    <div class="col s12">
                                        Programado:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.timing',["obj"=>$activity->detail->scheduledTiming])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->scheduledPeriod))
                                <div class="row">
                                    <div class="col s12">
                                        Programado:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.period',["obj"=>$activity->detail->scheduledPeriod])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->scheduledString))
                                <div class="row">
                                    <div class="col s12">
                                        Programado:
                                    </div>
                                    <div class="col s12">
                                        {{$activity->detail->scheduledString}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->location))
                                <div class="row">
                                    <div class="col s12">
                                        Lugar:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.reference',["obj"=>$activity->detail->location])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->performer))
                                <div class="row">
                                    <div class="col s12">
                                        Ejecutor:
                                    </div>
                                    @foreach ($activity->detail->performer as $performer)
                                        <div class="col s12">
                                            @include('fhir.element.reference',["obj"=>$performer])
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->productCodeableConcept))
                                <div class="row">
                                    <div class="col s12">
                                        Producto:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.codeableConcept',["obj"=>$activity->detail->productCodeableConcept])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->productReference))
                                <div class="row">
                                    <div class="col s12">
                                        Producto:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.reference',["obj"=>$activity->detail->productReference])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->dailyAmount))
                                <div class="row">
                                    <div class="col s12">
                                        Cantidad:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.quantity',["obj"=>$activity->detail->dailyAmount])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->quantity))
                                <div class="row">
                                    <div class="col s12">
                                        Cantidad:
                                    </div>
                                    <div class="col s12">
                                        @include('fhir.element.quantity',["obj"=>$activity->detail->quantity])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col s12">
                            @if (isset($activity->detail->description))
                                <div class="row">
                                    <div class="col s12">
                                        Descripción:
                                    </div>
                                    <div class="col s12">
                                        {{$activity->detail->description}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->note))
    <div class="row">
        <div class="col s12">
            Nota:
        </div>
        @foreach ($obj->note as $note)
            <div class="col s12">
                @include('fhir.element.annotation',["obj"=>$note])
            </div>
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===carePlan===</b>
        </div>
    </div>
@endif