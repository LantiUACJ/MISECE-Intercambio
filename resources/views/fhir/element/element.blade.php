@if (isset($obj->id) && isset($obj->extension))
    @if (env("TEST", false))
        <div class="row">
            <div class="col-12">
                <b>===ELEMENT===</b>
            </div>
        </div>
    @endif
@endif
@if (isset($obj->id))
    <!--<div class="row">
        <div class="col-12">ID: {{$obj->id}}</div>
    </div>-->
@endif
@if (isset($obj->extension))
    <div class="row">
    @foreach ($obj->extension as $extension)
        <div class="col-12">
            @include('fhir.element.extension',["obj"=>$extension])
        </div>
    @endforeach
    </div>
@endif
@if (isset($obj->id) && isset($obj->extension))
    @if (env("TEST", false))
        <div class="row">
            <div class="col-12">
                <b>===END-ELEMENT===</b>
            </div>
        </div>
    @endif
@endif