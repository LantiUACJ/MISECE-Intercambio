@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===EXTENSION===</b>
        </div>
    </div>
@endif
<div class="row">
    @if(isset($obj->url))
        <div class="col s3">
            Definición:
        </div>
        <div class="col s9">
            {{$obj->url}}
        </div>
    @endif
    @if(isset($obj->valueBase64Binary))
        <div class="col s12">
            {{$obj->valueBase64Binary}}
        </div>
    @endif
    @if(isset($obj->valueBoolean))
        <div class="col s12">
            {{$obj->valueBoolean}}
        </div>
    @endif
    @if(isset($obj->valueCanonical))
        <div class="col s12">
            {{$obj->valueCanonical}}
        </div>
    @endif
    @if(isset($obj->valueCode))
        <div class="col s12">
            {{$obj->valueCode}}
        </div>
    @endif
    @if(isset($obj->valueDate))
        <div class="col s12">
            {{$obj->valueDate}}
        </div>
    @endif
    @if(isset($obj->valueDateTime))
        <div class="col s12">
            {{$obj->valueDateTime}}
        </div>
    @endif
    @if(isset($obj->valueDecimal))
        <div class="col s12">
            {{$obj->valueDecimal}}
        </div>
    @endif
    @if(isset($obj->valueId))
        <div class="col s12">
            {{$obj->valueId}}
        </div>
    @endif
    @if(isset($obj->valueInstant))
        <div class="col s12">
            {{$obj->valueInstant}}
        </div>
    @endif
    @if(isset($obj->valueInteger))
        <div class="col s12">
            {{$obj->valueInteger}}
        </div>
    @endif
    @if(isset($obj->valueMarkdown))
        <div class="col s12">
            {{$obj->valueMarkdown}}
        </div>
    @endif
    @if(isset($obj->valueOid))
        <div class="col s12">
            {{$obj->valueOid}}
        </div>
    @endif
    @if(isset($obj->valuePositiveInt))
        <div class="col s12">
            {{$obj->valuePositiveInt}}
        </div>
    @endif
    @if(isset($obj->valueString))
        <div class="col s12">
            {{$obj->valueString}}
        </div>
    @endif
    @if(isset($obj->valueTime))
        <div class="col s12">
            {{$obj->valueTime}}
        </div>
    @endif
    @if(isset($obj->valueUnsignedInt))
        <div class="col s12">
            {{$obj->valueUnsignedInt}}
        </div>
    @endif
    @if(isset($obj->valueUri))
        <div class="col s12">
            {{$obj->valueUri}}
        </div>
    @endif
    @if(isset($obj->valueUrl))
        <div class="col s12">
            {{$obj->valueUrl}}
        </div>
    @endif
    @if(isset($obj->valueUuid))
        <div class="col s12">
            {{$obj->valueUuid}}
        </div>
    @endif

    @if(isset($obj->valueAddress))
        <div class="col s12">
            @include("fhir.element.address",["obj"=>$obj->valueAddress])
        </div>
    @endif
    @if(isset($obj->valueAge))
        <div class="col s12">
            @include("fhir.element.age",["obj"=>$obj->valueAge])
        </div>
    @endif
    @if(isset($obj->valueAnnotation))
        <div class="col s12">
            @include("fhir.element.annotation",["obj"=>$obj->valueAnnotation])
        </div>
    @endif
    @if(isset($obj->valueAttachment))
        
            @include("fhir.element.attachment",["obj"=>$obj->valueAttachment])
        </div>
    @endif
    @if(isset($obj->valueCodeableConcept))
        <div class="col s12">
            @include("fhir.element.codeableConcept",["obj"=>$obj->valueCodeableConcept])
        </div>
    @endif
    @if(isset($obj->valueCoding))
        <div class="col s12">
            @include("fhir.element.coding",["obj"=>$obj->valueCoding])
        </div>
    @endif
    @if(isset($obj->valueContactPoint))
        <div class="col s12">
            @include("fhir.element.contactPoint",["obj"=>$obj->valueContactPoint])
        </div>
    @endif
    @if(isset($obj->valueCount))
        <div class="col s12">
            @include("fhir.element.count",["obj"=>$obj->valueCount])
        </div>
    @endif
    @if(isset($obj->valueDistance))
        <div class="col s12">
            @include("fhir.element.distance",["obj"=>$obj->valueDistance])
        </div>
    @endif
    @if(isset($obj->valueDuration))
        <div class="col s12">
            @include("fhir.element.duration",["obj"=>$obj->valueDuration])
        </div>
    @endif
    @if(isset($obj->valueHumanName))
        <div class="col s12">
            @include("fhir.element.humanName",["obj"=>$obj->valueHumanName])
        </div>
    @endif
    @if(isset($obj->valueIdentifier))
        <div class="col s12">
            @include("fhir.element.identifier",["obj"=>$obj->valueIdentifier])
        </div>
    @endif
    @if(isset($obj->valueMoney))
        <div class="col s12">
            @include("fhir.element.money",["obj"=>$obj->valueMoney])
        </div>
    @endif
    @if(isset($obj->valuePeriod))
        <div class="col s12">
            @include("fhir.element.period",["obj"=>$obj->valuePeriod])
        </div>
    @endif
    @if(isset($obj->valueQuantity))
        <div class="col s12">
            @include("fhir.element.quantity",["obj"=>$obj->valueQuantity])
        </div>
    @endif
    @if(isset($obj->valueRange))
        <div class="col s12">
            @include("fhir.element.range",["obj"=>$obj->valueRange])
        </div>
    @endif
    @if(isset($obj->valueRatio))
        <div class="col s12">
            @include("fhir.element.ratio",["obj"=>$obj->valueRatio])
        </div>
    @endif
    @if(isset($obj->valueReference))
        <div class="col s12">
            @include("fhir.element.reference",["obj"=>$obj->valueReference])
        </div>
    @endif
    @if(isset($obj->valueSampledData))
        <div class="col s12">
            @include("fhir.element.sampledData",["obj"=>$obj->valueSampledData])
        </div>
    @endif
    @if(isset($obj->valueSignature))
        <div class="col s12">
            @include("fhir.element.signature",["obj"=>$obj->valueSignature])
        </div>
    @endif
    @if(isset($obj->valueTiming))
        <div class="col s12">
            @include("fhir.element.timing",["obj"=>$obj->valueTiming])
        </div>
    @endif
    @if(isset($obj->valueContactDetail))
        <div class="col s12">
            @include("fhir.element.contactDetail",["obj"=>$obj->valueContactDetail])
        </div>
    @endif
    @if(isset($obj->valueContributor))
        <div class="col s12">
            @include("fhir.element.contributor",["obj"=>$obj->valueContributor])
        </div>
    @endif
    @if(isset($obj->valueDataRequirement))
        <div class="col s12">
            @include("fhir.element.dataRequirement",["obj"=>$obj->valueDataRequiremen])
        </div>
    @endif
    @if(isset($obj->valueExpression))
        <div class="col s12">
            @include("fhir.element.expression",["obj"=>$obj->valueExpression])
        </div>
    @endif
    @if(isset($obj->valueParameterDefinition))
        <div class="col s12">
            @include("fhir.element.parameterDefinition",["obj"=>$obj->valueParameterDefin])
        </div>
    @endif
    @if(isset($obj->valueRelatedArtifact))
        <div class="col s12">
            @include("fhir.element.relatedArtifact",["obj"=>$obj->valueRelatedArtifac])
        </div>
    @endif
    @if(isset($obj->valueTriggerDefinition))
        <div class="col s12">
            @include("fhir.element.triggerDefinition",["obj"=>$obj->valueTriggerDefinit])
        </div>
    @endif
    @if(isset($obj->valueUsageContext))
        <div class="col s12">
            @include("fhir.element.usageContext",["obj"=>$obj->valueUsageContext])
        </div>
    @endif
    @if(isset($obj->valueDosage))
        <div class="col s12">
            @include("fhir.element.dosage",["obj"=>$obj->valueDosage])
        </div>
    @endif
    @if(isset($obj->valueMeta))
        <div class="col s12">
            @include("fhir.element.meta",["obj"=>$obj->valueMeta])
        </div>
    @endif
</div>

@include('fhir.element.element',["obj"=>$obj])

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-EXTENSION===</b>
        </div>
    </div>
@endif