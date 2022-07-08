@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===RELATEDARTIFACT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ($obj->type)
    <p><b>Tipo: </b>
        {{str_replace(["documentation","justification","citation","predecessor","successor","derived-from","depends-on","composed-of"],
                      ["documentation","justification","citation","predecessor","successor","derived-from","depends-on","composed-of"],$obj->type)}}
    </p>
@endif
@if ($obj->label)
    <p><b>Etiqueta: </b>
        {{$obj->label}}
    </p>
@endif
@if ($obj->display)
    <p><b>Mostrar: </b>
        {{$obj->display}}
    </p>
@endif
@if ($obj->citation)
    <p><b>Citación: </b>
        {{$obj->citation}}
    </p>
@endif
@if ($obj->url)
    <p><b>URL: </b>
        {{$obj->url}}
    </p>
@endif
@if ($obj->document)
    <p><b>Documento: </b>
        @include('fhir.element.attatchment', ["obj"=>$obj->document])
    </p>
@endif
@if ($obj->resource)
    <p><b>Recurso: </b>
        @include('fhir.element.reference', ["obj"=>$obj->resource])
    </p>
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-RELATEDARTIFACT===</b>
        </div>
    </div>
@endif