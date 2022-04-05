@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===DOMAINRESOURCE===</b>
        </div>
    </div>
@endif
@if (!isset($excludeResource))
    @include('fhir.resource.resource',["obj"=>$obj])
@endif
<div class="row">
    @if (isset($obj->text) && false)
        <div class="col-4">Resumen:</div>
        <div class="col-8">
            @include('fhir.element.narrative',["obj"=>$obj->text])
        </div>
    @endif
    @if (isset($obj->contained) && true)
        @foreach ($obj->contained as $contained)
            <div class="col-4">
                Contenido
                @include('fhir.resource.resource',["obj"=>$contained])
            </div>
        @endforeach
    @endif
    @if (isset($obj->modifierExtension) && false)
        <div class="col-4">
            Modificador de extensión
            {{$obj->modifierExtension}}
        </div>
    @endif
</div>
@if (isset($obj->extension))
    <div class="row">
        <!--<div class="col-12">Extensión:</div>-->
        @foreach ($obj->extension as $extension)
            @if (isset($extension->uri))
                {{$extension->uri}}
            @endif

            <div class="col-6 bloque">
                @include('fhir.element.extension',["obj"=>$extension])
            </div>
        @endforeach
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col-12">
            <b>===END-DOMAINRESOURCE===</b>
        </div>
    </div>
@endif