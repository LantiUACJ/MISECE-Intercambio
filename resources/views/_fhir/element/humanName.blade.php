@include('fhir.element.element',["obj"=>$obj])
<div class="row">
    <div class="col-12"><h4>Nombre:</h4></div>
    @if (isset($obj->text))
        <div class="col-3">
            <b>Nombre Completo:</b><br>
            {{$obj->text}}
        </div>
    @endif
    @if (isset($obj->prefix))
        <div class="col-3"> 
            <b>Prefijo</b> <br>
            @foreach ($obj->prefix as $prefix)
                {{$prefix}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->given))
        <div class="col-3">
            <b>Nombre(s)</b> <br>
            @foreach ($obj->given as $given)
                {{$given}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->family))
        <div class="col-3">
            <b>Apellido</b> <br>
            {{$obj->family}}
        </div>
    @endif
    @if (isset($obj->suffix))
        <div class="col-3">
            <b>Sufijo</b> <br>
            @foreach ($obj->suffix as $suffix)
                {{$suffix}}
            @endforeach
        </div>
    @endif
    @if (isset($obj->use))
        <div class="col-3">
            <b>Tipo de uso</b> <br>
            {{ str_replace(
                    ["usual","official","temp","nickname","anonymous","old","maiden"],
                    ["Usual","Oficial","Temporal","Apodo","Anónimo","Nombre viejo","Nombre de Soltera"], 
                    strtolower($obj->use)
                )
            }}
        </div>
    @endif
    @if (isset($obj->period))
        <div class="col-3">Período @include('fhir.element.period',["obj"=>$obj->period])</div>
    @endif
</div>