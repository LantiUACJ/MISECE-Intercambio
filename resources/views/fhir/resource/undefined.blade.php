@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===UNDEFINED===</b>
        </div>
    </div>
@endif

@include('fhir.resource.domainResource',["obj"=>$obj])

<div class="element">
    <h3>Recurso No definido</h3>
</div>

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-UNDEFINED===</b>
        </div>
    </div>
@endif