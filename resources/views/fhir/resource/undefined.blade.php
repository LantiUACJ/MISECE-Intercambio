@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===UNDEFINED===</b>
        </div>
    </div>
@endif

@include('fhir.resource.domainResource',["obj"=>$obj])

<div class="row">
    <div class="col s12">
        <h3>Recurso No definido</h3>
    </div>
</div>

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-UNDEFINED===</b>
        </div>
    </div>
@endif