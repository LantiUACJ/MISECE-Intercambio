@include('fhir.resource.resource',["obj"=>$obj])
<div class="element">
    @if (isset($obj->text) && env("TEST", false))
        <p>Resumen:</p>
        @include('fhir.element.narrative',["obj"=>$obj->text])
    @endif
    @if (isset($obj->contained))
        <p><b>Contenido adicional:</b></p>
        @foreach ($obj->contained as $contained)
            @include('fhir._factory',["obj"=>$contained])
        @endforeach
    @endif
    @if (isset($obj->modifierExtension))
        <p>Modificador de extensión: {{$obj->modifierExtension}}</p>
    @endif
    @if (isset($obj->extension))
        <p>Extensiones:</p>
        <div class="element">
            @foreach ($obj->extension as $extension)
                @include('fhir.element.extension',["obj"=>$extension]) <br>
            @endforeach
        </div>
    @endif
</div>