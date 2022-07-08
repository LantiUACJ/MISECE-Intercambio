@if (isset($obj->id) && isset($obj->extension))
    @if (env("TEST", false))
        <div class="row">
            <div class="col s12">
                <b>===ELEMENT===</b>
            </div>
        </div>
    @endif
@endif
@if (isset($obj->id))
    <!--<div class="row">
        <div class="col s12">ID: {{$obj->id}}</div>
    </div>-->
@endif
@if (isset($obj->extension))
    @foreach ($obj->extension as $extension)
        @include('fhir.element.extension',["obj"=>$extension]) <br>
    @endforeach
@endif
@if (isset($obj->id) && isset($obj->extension))
    @if (env("TEST", false))
        <div class="row">
            <div class="col s12">
                <b>===END-ELEMENT===</b>
            </div>
        </div>
    @endif
@endif