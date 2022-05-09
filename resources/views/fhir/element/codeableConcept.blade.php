@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CODEABLECONCEPT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->coding))
    <div class="row">
        @foreach ($obj->coding as $coding)
            <div class="col s12">
                @include('fhir.element.coding',["obj"=>$coding])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->text))
    <div class="row">
        <div class="col s12">
            {{$obj->text}}
        </div>
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CODEABLECONCEPT===</b>
        </div>
    </div>
@endif