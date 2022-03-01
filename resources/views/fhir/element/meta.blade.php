<div class="row">
    <div class="col-xs-12">
        <b>===META===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

@if ( isset($obj->versionId) )
    ID de versión
    {{$obj->versionId}}
@endif
@if ( isset($obj->lastUpdated) )
    Última actualización
    {{$obj->lastUpdated}}
@endif
@if ( isset($obj->source) )
    Fuente
    {{$obj->source}}
@endif
@if ( isset($obj->profile) )
    <div class="row">
        @foreach ($obj->profile as $profile)
            <div class="col-xs-4">Perfil</div>
            <div class="col-xs-8">{{$profile}}</div>
        @endforeach
    </div>
@endif
@if ( isset($obj->security) )
    @foreach ($obj->security as $security)
        Seguridad
        @include('fhir.element.coding',["obj"=>$security])
    @endforeach
@endif
@if ( isset($obj->tag) )
    @foreach ($obj->tag as $tag)
        Etiqueta
        @include('fhir.element.coding',["obj"=>$tag])
    @endforeach
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-META===</b>
    </div>
</div>