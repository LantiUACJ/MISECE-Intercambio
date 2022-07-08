@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===META===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if ( isset($obj->versionId) )
    <p><b>ID de versión</b></p>
    <div class="element">
        {{$obj->versionId}}
    </div>
@endif
@if ( isset($obj->lastUpdated) )
    <p><b>Última actualización: </b>{{$obj->lastUpdated}}</p>
@endif
@if ( isset($obj->source) )
    <p><b>Fuente</b></p>
    <div class="element">
        {{$obj->source}}
    </div>
@endif
@if ( isset($obj->profile) )
    <p><b>Perfil:</b></p>
    @foreach ($obj->profile as $profile)
        <div class="element">{{$profile}}</div>
    @endforeach
@endif
@if ( isset($obj->security) )
    <p><b>Seguridad:</b></p>
    @foreach ($obj->security as $security)
        @include('fhir.element.coding',["obj"=>$security])
    @endforeach
@endif
@if ( isset($obj->tag) )
    <p><b>Etiqueta:</b></p>
    @foreach ($obj->tag as $tag)
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