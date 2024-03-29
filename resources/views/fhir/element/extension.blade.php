@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===EXTENSION===</b>
        </div>
    </div>
@endif

@if(isset($obj->url))
    {{$obj->url}}:
@endif
<b>
    @if(isset($obj->valueBase64Binary))
        {{$obj->valueBase64Binary}}
    @endif
    @if(isset($obj->valueBoolean))
        {{$obj->valueBoolean}}
    @endif
    @if(isset($obj->valueCanonical))
        {{$obj->valueCanonical}}
    @endif
    @if(isset($obj->valueCode))
        {{$obj->valueCode}}
    @endif
    @if(isset($obj->valueDate))
        {{$obj->valueDate}}
    @endif
    @if(isset($obj->valueDateTime))
        {{$obj->valueDateTime}}
    @endif
    @if(isset($obj->valueDecimal))
        {{$obj->valueDecimal}}
    @endif
    @if(isset($obj->valueId))
        {{$obj->valueId}}
    @endif
    @if(isset($obj->valueInstant))
        {{$obj->valueInstant}}
    @endif
    @if(isset($obj->valueInteger))
        {{$obj->valueInteger}}
    @endif
    @if(isset($obj->valueMarkdown))
        {{$obj->valueMarkdown}}
    @endif
    @if(isset($obj->valueOid))
        {{$obj->valueOid}}
    @endif
    @if(isset($obj->valuePositiveInt))
        {{$obj->valuePositiveInt}}
    @endif
    @if(isset($obj->valueString))
        {{$obj->valueString}}
    @endif
    @if(isset($obj->valueTime))
        {{$obj->valueTime}}
    @endif
    @if(isset($obj->valueUnsignedInt))
        {{$obj->valueUnsignedInt}}
    @endif
    @if(isset($obj->valueUri))
        {{$obj->valueUri}}
    @endif
    @if(isset($obj->valueUrl))
        {{$obj->valueUrl}}
    @endif
    @if(isset($obj->valueUuid))
        {{$obj->valueUuid}}
    @endif
    @if(isset($obj->valueAddress))
        @include("fhir.element.address",["obj"=>$obj->valueAddress])
    @endif
    @if(isset($obj->valueAge))
        @include("fhir.element.age",["obj"=>$obj->valueAge])
    @endif
    @if(isset($obj->valueAnnotation))
        @include("fhir.element.annotation",["obj"=>$obj->valueAnnotation])
    @endif
    @if(isset($obj->valueAttachment))
        @include("fhir.element.attachment",["obj"=>$obj->valueAttachment])
    @endif
    @if(isset($obj->valueCodeableConcept))
        @include("fhir.element.codeableConcept",["obj"=>$obj->valueCodeableConcept])
    @endif
    @if(isset($obj->valueCoding))
        @include("fhir.element.coding",["obj"=>$obj->valueCoding])
    @endif
    @if(isset($obj->valueContactPoint))
        @include("fhir.element.contactPoint",["obj"=>$obj->valueContactPoint])
    @endif
    @if(isset($obj->valueCount))
        @include("fhir.element.count",["obj"=>$obj->valueCount])
    @endif
    @if(isset($obj->valueDistance))
        @include("fhir.element.distance",["obj"=>$obj->valueDistance])
    @endif
    @if(isset($obj->valueDuration))
        @include("fhir.element.duration",["obj"=>$obj->valueDuration])
    @endif
    @if(isset($obj->valueHumanName))
        @include("fhir.element.humanName",["obj"=>$obj->valueHumanName])
    @endif
    @if(isset($obj->valueIdentifier))
        @include("fhir.element.identifier",["obj"=>$obj->valueIdentifier])
    @endif
    @if(isset($obj->valueMoney))
        @include("fhir.element.money",["obj"=>$obj->valueMoney])
    @endif
    @if(isset($obj->valuePeriod))
        @include("fhir.element.period",["obj"=>$obj->valuePeriod])
    @endif
    @if(isset($obj->valueQuantity))
        @include("fhir.element.quantity",["obj"=>$obj->valueQuantity])
    @endif
    @if(isset($obj->valueRange))
        @include("fhir.element.range",["obj"=>$obj->valueRange])
    @endif
    @if(isset($obj->valueRatio))
        @include("fhir.element.ratio",["obj"=>$obj->valueRatio])
    @endif
    @if(isset($obj->valueReference))
        @include("fhir.element.reference",["obj"=>$obj->valueReference])
    @endif
    @if(isset($obj->valueSampledData))
        @include("fhir.element.sampledData",["obj"=>$obj->valueSampledData])
    @endif
    @if(isset($obj->valueSignature))
        @include("fhir.element.signature",["obj"=>$obj->valueSignature])
    @endif
    @if(isset($obj->valueTiming))
        @include("fhir.element.timing",["obj"=>$obj->valueTiming])
    @endif
    @if(isset($obj->valueContactDetail))
        @include("fhir.element.contactDetail",["obj"=>$obj->valueContactDetail])
    @endif
    @if(isset($obj->valueContributor))
        @include("fhir.element.contributor",["obj"=>$obj->valueContributor])
    @endif
    @if(isset($obj->valueDataRequirement))
        @include("fhir.element.dataRequirement",["obj"=>$obj->valueDataRequiremen])
    @endif
    @if(isset($obj->valueExpression))
        @include("fhir.element.expression",["obj"=>$obj->valueExpression])
    @endif
    @if(isset($obj->valueParameterDefinition))
        @include("fhir.element.parameterDefinition",["obj"=>$obj->valueParameterDefin])
    @endif
    @if(isset($obj->valueRelatedArtifact))
        @include("fhir.element.relatedArtifact",["obj"=>$obj->valueRelatedArtifac])
    @endif
    @if(isset($obj->valueTriggerDefinition))
        @include("fhir.element.triggerDefinition",["obj"=>$obj->valueTriggerDefinit])
    @endif
    @if(isset($obj->valueUsageContext))
        @include("fhir.element.usageContext",["obj"=>$obj->valueUsageContext])
    @endif
    @if(isset($obj->valueDosage))
        @include("fhir.element.dosage",["obj"=>$obj->valueDosage])
    @endif
    @if(isset($obj->valueMeta))
        @include("fhir.element.meta",["obj"=>$obj->valueMeta])
    @endif
</b>
@include('fhir.element.element',["obj"=>$obj])

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-EXTENSION===</b>
        </div>
    </div>
@endif