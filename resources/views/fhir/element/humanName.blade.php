<div class="row">
    <div class="col-xs-12">
        <b>===HUMANNAME===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])
<div class="row">
    @if (isset($obj->text))
        <div class="col-xs-3">Nombre Completo: {{$obj->text}} </div>
    @endif
    @if (isset($obj->use))
        <div class="col-xs-3">Tipo de uso {{ str_replace(["usual","official","temp","nickname","anonymous","old","maiden"],["Usual","Oficial","Temporal","Apodo","Anónimo","Nombre viejo","Nombre de Soltera"], strtolower($obj->use))}}</div>
    @endif
    @if (isset($obj->period))
        <div class="col-xs-3">Período @include('fhir.element.period',["obj"=>$obj->period])</div>
    @endif
</div>
<div class="row">
    @if (isset($obj->prefix))
        <div class="col-xs-3"> Prefijo</div>
    @endif
    @if (isset($obj->given))
        <div class="col-xs-3"> Nombre(s)</div>
    @endif
    @if (isset($obj->family))
        <div class="col-xs-3"> Apellido</div>
    @endif
    @if (isset($obj->suffix))
        <div class="col-xs-3"> Sufijo</div>
    @endif
</div>
<div class="row">
    @if (isset($obj->prefix))
        <div class="col-xs-3">
            @foreach ($obj->prefix as $prefix)
                {{$prefix}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->given))
        <div class="col-xs-3">
            @foreach ($obj->given as $given)
                {{$given}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->family))
        <div class="col-xs-3">
            {{$obj->family}}
        </div>
    @endif
    @if (isset($obj->suffix))
        <div class="col-xs-3">
            @foreach ($obj->suffix as $suffix)
                {{$suffix}}
            @endforeach
        </div>
    @endif
</div>
<div class="row">
    <div class="col-xs-12">
        <b>===END-HUMANNAME===</b>
    </div>
</div>