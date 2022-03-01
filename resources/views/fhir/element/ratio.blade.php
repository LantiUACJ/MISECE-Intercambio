<div class="row">
    <div class="col-xs-12">
        <b>===RATIO===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

<div class="row">
    @if (isset($obj->numerator))
        <div class="col-xs-6">
            @include('fhir.element.quantity',["obj"=>$obj->numerator])
        </div>
    @endif
    @if (isset($obj->denominator))
        <div class="col-xs-6">
            @include('fhir.element.quantity',["obj"=>$obj->denominator])
        </div>
    @endif
</div>
<div class="row">
    <div class="col-xs-12">
        <b>===END-RATIO===</b>
    </div>
</div>