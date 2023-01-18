@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===MedicationRequest===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
<div class="element">
    @if (isset($obj->identifier) && $obj->identifier)
        <p><b>Identificador(es):</b></p>
        <div class="element">
            @foreach ($obj->identifier as $identifier)
                <p>@include('fhir.element.identifier',["obj"=>$identifier])</p>
            @endforeach
        </div>
    @endif
    @if (isset($obj->status))
        <p><b>Estado:</b></p>
        <div class="element">
            {{str_replace(["active","on-hold","cancelled","completed","entered-in-error","stopped","draft","unknown"], ["active","on-hold","cancelled","completed","entered-in-error","stopped","draft","unknown"], $obj->status)}}
        </div>
    @endif
    @if (isset($obj->statusReason))
        <p><b>motivo del estado:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->statusReason])
        </div>
    @endif
    @if (isset($obj->intent))
        <p><b>Intención:</b></p>
        <div class="element">
            {{str_replace(["proposal","plan","order","original-order","reflex-order","filler-order","instance-order","option"], ["proposal","plan","order","original-order","reflex-order","filler-order","instance-order","option"], $obj->intent)}}
        </div>
    @endif
    @if (isset($obj->category) && $obj->category)
        <p><b>Categoría(s):</b>
        @foreach ($obj->category as $category)
            @include('fhir.element.codeableConcept', ["obj"=>$category])
        @endforeach
    @endif
    @if (isset($obj->priority))
        <p><b>Prioridad:</b></p>
        <div class="element">
            {{str_replace(["routine","urgent","asap","stat"], ["routine","urgent","asap","stat"], $obj->priority)}}
        </div>
    @endif
    @if (isset($obj->doNotPerform))
        <p><b>Realizar:</b></p>
        <div class="element">
            {{$obj->doNotPerform?"No realizar":"Si realizar"}}
        </div>
    @endif
    @if (isset($obj->reportedBoolean))
        <p><b>Reportado:</b></p>
        <div class="element">
            {{$obj->reportedBoolean?"SI":"NO"}}
        </div>
    @endif
    @if (isset($obj->reportedReference))
        <p><b>Referencia reportada</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->reportedReference])
        </div>
    @endif
    @if (isset($obj->medicationCodeableConcept))
        <p><b>Medicamento:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->medicationCodeableConcept])
        </div>
    @endif
    @if (isset($obj->medicationReference))
        <p><b>Medicamento:</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->medicationReference])
        </div>
    @endif
    @if (isset($obj->subject))
        <p><b>Paciente</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    @endif
    @if (isset($obj->encounter))
        <p><b>Visita</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    @endif
    @if (isset($obj->supportingInformation))
        <p><b>Información de soporte</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->supportingInformation])
        </div>
    @endif
    @if (isset($obj->authoredOn))
        <p><b>Autorizado en:</b></p>
        <div class="element">
            {{$obj->authoredOn}}
        </div>
    @endif
    @if (isset($obj->requester))
        <p><b>Solicitante</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->requester])
        </div>
    @endif
    @if (isset($obj->performer))
        <p><b>Ejecutor</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->performer])
        </div>
    @endif
    @if (isset($obj->performerType))
        <p><b>Tipo de ejecutor:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->performerType])
        </div>
    @endif
    @if (isset($obj->recorder))
        <p><b>Archivisa</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->recorder])
        </div>
    @endif
    @if (isset($obj->reasonCode) && $obj->reasonCode)
        <p><b>Código de razón</b>
        @foreach ($obj->reasonCode as $reasonCode)
            @include('fhir.element.codeableConcept', ["obj"=>$reasonCode])
        @endforeach
    @endif
    @if (isset($obj->reasonReference) && $obj->reasonReference)
        <p><b>Referencia al motivo:</b></p>
        @foreach ($obj->reasonReference as $reasonReference)
            <div class="element">
                @include('fhir.element.reference',["obj"=>$reasonReference])
            </div>
        @endforeach
    @endif
    @if (isset($obj->instantiatesCanonical) && $obj->instantiatesCanonical)
        <p><b>Instancias canónicas:</b></p>
        @foreach ($obj->instantiatesCanonical as $instantiatesCanonical)
            {{$instantiatesCanonical}}
        @endforeach
    @endif
    @if (isset($obj->instantiatesUri) && $obj->instantiatesUri)
        <p><b>Instancias canónicas URI:</b></p>
        @foreach ($obj->instantiatesUri as $instantiatesUri)
            {{$instantiatesUri}}
        @endforeach
    @endif
    @if (isset($obj->basedOn) && $obj->basedOn)
        <p><b>Basado en</b></p>
        <div class="element">
            @foreach ($obj->basedOn as $basedOn)
                @include('fhir.element.reference',["obj"=>$basedOn])
            @endforeach
        </div>
    @endif
    @if (isset($obj->groupIdentifier))
        <p><b>Identificador de grupo:</b></p>
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$obj->groupIdentifier])
        </div>
    @endif
    @if (isset($obj->courseOfTherapyType))
        <p><b>Curso de tipo de terapia:</b></p>
        <div class="element">
            @include('fhir.element.codeableConcept',["obj"=>$obj->courseOfTherapyType])
        </div>
    @endif
    @if (isset($obj->insurance) && $obj->insurance)
        <p><b>Basado en</b></p>
        <div class="element">
            @foreach ($obj->insurance as $insurance)
                @include('fhir.element.reference',["obj"=>$insurance])
            @endforeach
        </div>
    @endif
    @if (isset($obj->note) && $obj->note)
        <p><b>Anotación(es): </b></p>
        <div class="element">
            @foreach ($obj->note as $note)
                @include('fhir.element.annotation',["obj"=>$note])
            @endforeach
        </div>
    @endif
    @if (isset($obj->dosageInstruction) && $obj->dosageInstruction)
        <p><b>Instrucciones: </b></p>
        <div class="element">
            @foreach ($obj->dosageInstruction as $dosageInstruction)
                @include('fhir.element.dosage',["obj"=>$dosageInstruction])
            @endforeach
        </div>
    @endif
    @if (isset($obj->dispenseRequest) && $obj->dispenseRequest)
        @if (isset($obj->dispenseRequest->initialFill) && $obj->dispenseRequest->initialFill)
            @if (isset($obj->dispenseRequest->initialFill->quantity))
                <p><b>Permitido:</b></p>
                <div class="element">
                    @include('fhir.element.quantity', ["obj"=>$obj->dispenseRequest->initialFill->quantity])
                </div>
            @endif
            @if (isset($obj->dispenseRequest->initialFill->duration))
                <p><b>Permitido:</b></p>
                <div class="element">
                    @include('fhir.element.quantity', ["obj"=>$obj->dispenseRequest->initialFill->duration])
                </div>
            @endif
        @endif
        @if (isset($obj->substitution->dispenseInterval))
            <p><b>Permitido:</b></p>
            <div class="element">
                @include('fhir.element.quantity', ["obj"=>$obj->substitution->dispenseInterval])
            </div>
        @endif
        @if (isset($obj->substitution->validityPeriod))
            <p><b>Permitido:</b></p>
            <div class="element">
                @include('fhir.element.period', ["obj"=>$obj->substitution->validityPeriod])
            </div>
        @endif
        @if (isset($obj->substitution->numberOfRepeatsAllowed))
            <p><b>Permitido:</b></p>
            <div class="element">
                {{$obj->substitution->numberOfRepeatsAllowed}}
            </div>
        @endif
        @if (isset($obj->substitution->quantity))
            <p><b>Permitido:</b></p>
            <div class="element">
                @include('fhir.element.quantity', ["obj"=>$obj->substitution->quantity])
            </div>
        @endif
        @if (isset($obj->substitution->expectedSupplyDuration))
            <p><b>Permitido:</b></p>
            <div class="element">
                @include('fhir.element.quantity', ["obj"=>$obj->substitution->expectedSupplyDuration])
            </div>
        @endif
        @if (isset($obj->dispenseRequest->performer))
            <p><b>Archivisa</b></p>
            <div class="element">
                @include('fhir.element.reference',["obj"=>$obj->dispenseRequest->performer])
            </div>
        @endif
    @endif
    @if (isset($obj->substitution))
        <div class="element">
            <p><b>Substituto:</b></p>
            <div class="element">
                @if (isset($obj->substitution["allowedBoolean"]))
                    <p><b>Permitido:</b> {{$obj->substitution["allowedBoolean"]?"SI":"NO"}} </p>
                        
                @endif
                @if (isset($obj->substitution["allowedCodeableConcept"]))
                    <p><b>Permitido:</b></p>
                    <div class="element">
                        @include('fhir.element.codeableConcept',["obj"=>$obj->substitution["allowedCodeableConcept"]])
                    </div>
                @endif
                @if (isset($obj->substitution["reason"]))
                    <p><b>Razón:</b></p>
                    <div class="element">
                        @include('fhir.element.codeableConcept',["obj"=>$obj->substitution["reason"]])
                    </div>
                @endif
            </div>
        </div>    
    @endif
    @if (isset($obj->priorPrescription))
        <p><b>prescripción previa</b></p>
        <div class="element">
            @include('fhir.element.reference',["obj"=>$obj->priorPrescription])
        </div>
    @endif
    @if (isset($obj->detectedIssue) && $obj->detectedIssue)
        <p><b>Problema encontrado</b></p>
        <div class="element">
            @foreach ($obj->detectedIssue as $detectedIssue)
                @include('fhir.element.reference',["obj"=>$detectedIssue])
            @endforeach
        </div>
    @endif
    @if (isset($obj->eventHistory) && $obj->eventHistory)
        <p><b>Problema encontrado</b></p>
        <div class="element">
            @foreach ($obj->eventHistory as $eventHistory)
                @include('fhir.element.reference',["obj"=>$eventHistory])
            @endforeach
        </div>
    @endif
</div>
@if (env("TEST", false))
  <div class="row">
      <div class="element">
          <b>===END-MEDICATIONADMINISTRATION===</b>
      </div>
  </div>
@endif