@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===carePlan===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->instantiatesCanonical))
    <p><b>Instancia</b></p>
    <div class="element">
        @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
            {{$instantiatesCanonical}}
        @endforeach
    </div>
@endif
@if (isset($obj->instantiatesUri))
    <p><b>Instancia</b></p>
    <div class="element">
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            {{$instantiatesUri}}
        @endforeach
    </div>
@endif
@if (isset($obj->basedOn))
    <p><b>Basado en</b></p>
    <div class="element">
        @foreach ($obj->basedOn as $basedOn)
            @include('fhir.element.reference',["obj"=>$basedOn])
        @endforeach
    </div>
@endif
@if (isset($obj->replaces))
    <p><b>Remplaza:</b></p>
    <div class="element">
        @foreach ($obj->replaces as $replaces)
            @include('fhir.element.reference',["obj"=>$replaces])
        @endforeach
    </div>
@endif
@if (isset($obj->partOf))
    <p><b>Parte de:</b></p>
    <div class="element">
        @foreach ($obj->partOf as $partOf)
            @include('fhir.element.reference',["obj"=>$partOf])
        @endforeach
    </div>
@endif
@if (isset($obj->status))
    <p><b>Estado: {{ str_replace(["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"],
        ["draft", "active","on-hold","revoked","completed","entered-in-error","unknown"], strtolower($obj->status))}}</b></p>
@endif
@if (isset($obj->intent))
    <p><b>Propósito: {{ str_replace(["proposal", "plan","order","option"],
        ["proposal", "plan","order","option"], strtolower($obj->intent))}}</b></p>
@endif
@if (isset($obj->category))
    <p><b>Categoría:</b></p>
    <div class="element">
        @foreach ($obj->category as $category)
            @include('fhir.element.codeableConcept',["obj"=>$category])
        @endforeach
    </div>
@endif
@if (isset($obj->title))
    <p><b>Título: {{ $obj->title }}</b></p>
@endif
@if (isset($obj->description))
    <p><b>Descripción: {{ $obj->description }}</b></p>
@endif
@if (isset($obj->subject))
    <p><b>Paciente:</b> @include('fhir.element.reference',["obj"=>$obj->subject])</p>
@endif
@if (isset($obj->encounter))
    <p><b>Visita</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->encounter])
    </div>
@endif
<!-- IDENTIFICADORES DE TIEMPO -->
@if (isset($obj->period))
    <p><b>Período:</b> @include('fhir.element.period',["obj"=>$obj->period])</p>
@endif
@if (isset($obj->created))
    <p><b>Creado en: {{ $obj->created }}</b></p>
@endif
@if (isset($obj->author))
    <p><b>Autor:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->author])
    </div>
@endif
@if (isset($obj->contributor))
    <p><b>Colaboradores:</b></p>
    <div class="element">
        @foreach ($obj->contributor as $contributor)
            @include('fhir.element.reference',["obj"=>$contributor])
        @endforeach
    </div>
@endif
@if (isset($obj->careTeam))
    <p><b>Equipo:</b></p>
    <div class="element">
        @foreach ($obj->careTeam as $careTeam)
            * @include('fhir.element.reference',["obj"=>$careTeam]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->addresses))
    <p><b>Problemas a tratar:</b></p>
    <div class="element">
        @foreach ($obj->addresses as $addresses)
            * @include('fhir.element.reference',["obj"=>$addresses]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->supportingInfo))
    <p><b>Información de soporte:</b></p>
    <div class="element">
        @foreach ($obj->supportingInfo as $supportingInfo)
            @include('fhir.element.reference',["obj"=>$supportingInfo])
        @endforeach
    </div>
@endif
@if (isset($obj->goal))
    <p><b>Meta(s):</b></p>
    <div class="element">
        @foreach ($obj->goal as $goal)
            * @include('fhir.element.reference',["obj"=>$goal]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->activity))
    <p><b>Actividad(es):</b></p>
    <div class="element">
        @foreach ($obj->activity as $activity)
            <hr>
            @if (isset($activity->outcomeCodeableConcept))
                <p><b>Resultado de la actividad:</b></p>
                <div class="element">
                    @foreach ($activity->outcomeCodeableConcept as $outcomeCodeableConcept)
                        * @include('fhir.element.codeableConcept',["obj"=>$outcomeCodeableConcept]) <br>
                    @endforeach
                </div>
            @endif
            @if (isset($activity->outcomeReference))
                <p><b>Referencia del resultado de la actividad:</b></p>
                <div class="element">
                    @foreach ($activity->outcomeReference as $outcomeReference)
                        @include('fhir.element.reference',["obj"=>$outcomeReference])
                    @endforeach
                </div>
            @endif
            @if (isset($activity->progress))
                <p><b>Proceso:</b></p>
                <div class="element">
                    @foreach ($activity->progress as $progress)
                        * @include('fhir.element.annotation',["obj"=>$progress]) <br>
                    @endforeach
                </div>
            @endif
            @if (isset($activity->reference))
                <p><b>Referencia:</b></p>
                <div class="element">
                    @include('fhir.element.reference',["obj"=>$activity->reference])
                </div>
            @endif
            @if (isset($activity->detail))
                <p><b>Detalle de la actividad:</b></p>
                <div class="element">
                    @if (isset($activity->detail->kind))
                        <p><b>Tipo:</b>
                            {{ str_replace(
                                ["Appointment","CommunicationRequest","DeviceRequest","MedicationRequest","NutritionOrder","Task","ServiceRequest","VisionPrescription"],
                                ["Appointment","CommunicationRequest","DeviceRequest","MedicationRequest","NutritionOrder","Task","ServiceRequest","VisionPrescription"],
                                $activity->detail->kind
                            ) }}
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->instantiatesCanonical))
                        <p><b>Instancia:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->instantiatesCanonical as $instantiatesCanonical)
                                * {{$instantiatesCanonical}} <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->instantiatesUri))
                        <p><b>Instancian:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->instantiatesUri as $instantiatesUri)
                                * {{$instantiatesUri}} <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->code))
                        <p><b>Código:</b> @include('fhir.element.codeableConcept',["obj"=>$activity->detail->code])</p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->reasonCode))
                        <p><b>Código de Razón:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->reasonCode as $reasonCode)
                                @include('fhir.element.codeableConcept',["obj"=>$reasonCode])
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->reasonReference))
                        <p><b>Referencia de la razón:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->reasonReference as $reasonReference)
                                @include('fhir.element.codeableConcept',["obj"=>$reasonReference])
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->goal))
                        <p><b>Referencia de la meta:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->goal as $goal)
                                * @include('fhir.element.reference',["obj"=>$goal]) <br>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->status))
                        <p><b>Estado:</b>
                            {{ str_replace(
                                ["not-started","scheduled","in-progress","on-hold","completed","cancelled","stopped","unknown","entered-in-error"],
                                ["not-started","scheduled","in-progress","on-hold","completed","cancelled","stopped","unknown","entered-in-error"],
                                $activity->detail->status
                            ) }}
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->statusReason))
                        <p><b>Razón del estado:</b></p>
                        <div class="element">
                            @include('fhir.element.codeableConcept',["obj"=>$activity->detail->statusReason])
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->doNotPerform))
                        <p><b>Prohibido realizar:</b>
                            {{$activity->detail->doNotPerform?"SI":"NO"}}
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->scheduledTiming))
                        <p><b>Programado:</b>
                            @include('fhir.element.timing',["obj"=>$activity->detail->scheduledTiming])
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->scheduledPeriod))
                        <p><b>Programado:</b>
                            @include('fhir.element.period',["obj"=>$activity->detail->scheduledPeriod])
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->scheduledString))
                        <p><b>Programado:</b>
                            {{$activity->detail->scheduledString}}
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->location))
                        <p><b>Lugar:</b>
                            @include('fhir.element.reference',["obj"=>$activity->detail->location])
                        </p>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->performer))
                        <p><b>Ejecutor:</b></p>
                        <div class="element">
                            @foreach ($activity->detail->performer as $performer)
                                * @include('fhir.element.reference',["obj"=>$performer])
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->productCodeableConcept))
                        <p><b>Producto:</b></p>
                        <div class="element">
                            @include('fhir.element.codeableConcept',["obj"=>$activity->detail->productCodeableConcept])
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->productReference))
                        <p><b>Producto:</b></p>
                        <div class="element">
                            @include('fhir.element.reference',["obj"=>$activity->detail->productReference])
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->dailyAmount))
                        <p><b>Cantidad:</b></p>
                        <div class="element">
                            @include('fhir.element.quantity',["obj"=>$activity->detail->dailyAmount])
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->quantity))
                        <p><b>Cantidad:</b></p>
                        <div class="element">
                            @include('fhir.element.quantity',["obj"=>$activity->detail->quantity])
                        </div>
                    @endif
                </div>
                <div class="element">
                    @if (isset($activity->detail->description))
                        <p><b>Descripción:</b></p>
                        <div class="element">
                            {{$activity->detail->description}}
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->note))
    <p><b>Nota:</b></p>
    @foreach ($obj->note as $note)
        * @include('fhir.element.annotation',["obj"=>$note])
    @endforeach
@endif
@if (isset($obj->identifier))
    <p><b>Identificador</b></p>
    <div class="element">
        @foreach ($obj->identifier as $identifier)
            @include('fhir.element.identifier',["obj"=>$identifier])
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