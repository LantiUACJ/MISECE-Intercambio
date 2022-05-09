@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===ATTACHMENT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if ( isset($obj->contentType))
    Tipo de contenido
    {{$obj->contentType}}
@endif
@if ( isset($obj->language))
    Lenguaje
    {{$obj->language}}
@endif
@if ( isset($obj->data))
    Datos
    <p style="white-space: pre-wrap;">{{base64_decode($obj->data)}}</p>
@endif
@if ( isset($obj->url))
    URL
    {{$obj->url}}
@endif
@if ( isset($obj->size))
    Peso
    {{$obj->size}}
@endif
@if ( isset($obj->hash))
    Hash
    {{$obj->hash}}
@endif
@if ( isset($obj->title))
    Titulo
    {{$obj->title}}
@endif
@if ( isset($obj->creation))
    Creado el
    {{$obj->creation}}    
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-ATTACHMENT===</b>
        </div>
    </div>
@endif