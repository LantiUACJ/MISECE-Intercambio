@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===ATTACHMENT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if ( isset($obj->contentType))
    <p><b>Tipo de contenido:</b></p>
    {{$obj->contentType}}
@endif
@if ( isset($obj->language))
    Lenguaje
    {{$obj->language}}
@endif
@if ( isset($obj->data))
    <p><b>Datos:</b></p>
    @if (isset($obj->contentType) && $obj->contentType == "image/jpeg")
        <img src="data:image/jpeg;base64,{{$obj->data}}" alt="">
    @else
        @if (isset($obj->contentType) && $obj->contentType == "application/pdf")
            <embed src="data:application/pdf;base64,{{$obj->data}}" type="application/pdf" width="100%" height="500px"/>
        @else
            <p style="white-space: pre-wrap;">{{base64_decode($obj->data)}}</p>
        @endif
    @endif
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