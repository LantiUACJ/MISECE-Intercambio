@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===AGE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

{{dd($obj)}}
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-AGE===</b>
        </div>
    </div>
@endif