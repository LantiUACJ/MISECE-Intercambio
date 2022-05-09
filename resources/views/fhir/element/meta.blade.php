@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===META===</b>
        </div>
    </div>
@endif
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
            <div class="col s4">Perfil</div>
            <div class="col s8">{{$profile}}</div>
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
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-META===</b>
        </div>
    </div>
@endif