@include('fhir.resource.resource',["obj"=>$obj])
<div class="row">
    @if (isset($obj->text) && false)
        <div class="col s4">Resumen:</div>
        <div class="col s8">
            @include('fhir.element.narrative',["obj"=>$obj->text])
        </div>
    @endif
    @if (isset($obj->contained) && true)
        @foreach ($obj->contained as $contained)
            <div class="col s4">
                Contenido
                @include('fhir.resource.resource',["obj"=>$contained])
            </div>
        @endforeach
    @endif
    @if (isset($obj->modifierExtension) && false)
        <div class="col s4">
            Modificador de extensión
            {{$obj->modifierExtension}}
        </div>
    @endif
</div>
@if (isset($obj->extension))
    <div class="row">
        <!--<div class="col s12">Extensión:</div>-->
        @foreach ($obj->extension as $extension)
            @if (isset($extension->uri))
                {{$extension->uri}}
            @endif

            <div class="col s6 bloque">
                @include('fhir.element.extension',["obj"=>$extension])
            </div>
        @endforeach
    </div>
@endif