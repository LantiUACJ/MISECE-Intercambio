@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===HUMANNAME===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->prefix))
    @foreach ($obj->prefix as $prefix)
        <b>{{$prefix}}</b>
    @endforeach
@endif

@if ((isset($obj->text) && !$obj->text) || (!isset($obj->text)))
    @if (isset($obj->given))
        @foreach ($obj->given as $given)
            <b>{{$given}}</b>
        @endforeach
    @endif
    @if (isset($obj->family))
        <b>{{$obj->family}}</b>
    @endif
@endif

@if (isset($obj->text) && $obj->text)
    <b>{{$obj->text}}</b>.
@endif

@if (isset($obj->suffix))
    @foreach ($obj->suffix as $suffix)
        <b>{{$suffix}}</b>
    @endforeach
@endif
@if (isset($obj->use))
    @if ($obj->use !== "official")
        Este nombre es de tipo <b>{{ str_replace(["usual","official","temp","nickname","anonymous","old","maiden"],["Usual","Oficial","Temporal","Apodo","Anónimo","Nombre viejo","Nombre de Soltera"], strtolower($obj->use))}}</b>.
    @endif
@endif
@if (isset($obj->period))
    Durante el período de @include('fhir.element.period',["obj"=>$obj->period]).
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-HUMANNAME===</b>
        </div>
    </div>
@endif