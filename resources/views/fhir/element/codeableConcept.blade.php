@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===CODEABLECONCEPT===</b></div></div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->coding))
    @foreach ($obj->coding as $coding)
        @include('fhir.element.coding',["obj"=>$coding])
    @endforeach
@endif
@if (isset($obj->text))
    {{$obj->text}}
@endif
@if (env("TEST", false))
    <div class="row"><div class="col s12"><b>===END-CODEABLECONCEPT===</b></div></div>
@endif