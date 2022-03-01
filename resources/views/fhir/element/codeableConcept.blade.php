<div class="row">
    <div class="col-xs-12">
        <b>===CODEABLECONCEPT===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->coding))
    <div class="row">
        @foreach ($obj->coding as $coding)
            <div class="col-xs-12">
                @include('fhir.element.coding',["obj"=>$coding])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->text))
    <div class="row">
        <div class="col-xs-12">
            {{$obj->text}}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-CODEABLECONCEPT===</b>
    </div>
</div>