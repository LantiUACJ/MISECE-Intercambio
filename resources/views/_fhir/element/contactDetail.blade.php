@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===CONTACTDETAIL===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "name" : "<string>", // Name of an individual to contact
    "telecom" : [{ ContactPoint }] // Contact details for individual or organization
}

@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-CONTACTDETAIL===</b>
        </div>
    </div>
@endif