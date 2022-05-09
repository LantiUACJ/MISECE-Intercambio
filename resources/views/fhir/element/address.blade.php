@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===ADDRESS===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->use))
    Uso {{str_replace( ["home", "work", "temp", "old", "billing"], ["Hogar","Trabajo","Temporal","Vieja dirección","Facturación"], $obj->use)}}
@endif
@if (isset($obj->code))
    Código {{$obj->code}}
@endif
@if (isset($obj->type))
    Tipo {{str_replace(["postal", "physical", "both"],["Postal","Físico","Postal y Físico"], strtolower($obj->type))}}
@endif
@if (isset($obj->text))
    Texto {{$obj->text}}
@endif
@if (isset($obj->line))
    @foreach ($obj->line as $line)
        Linea {{$line}}
    @endforeach
@endif
@if (isset($obj->city))
    Ciudad {{$obj->city}}
@endif
@if (isset($obj->district))
    Localidad {{$obj->district}}
@endif
@if (isset($obj->state))
    Estado {{$obj->state}}
@endif
@if (isset($obj->postalCode))
    Código postal {{$obj->postalCode}}
@endif
@if (isset($obj->country))
    País {{$obj->country}}
@endif
@if (isset($obj->period))
<div class="row">
    <div class="col s12">
        Período <br>
        @include('fhir.element.period',["obj"=>$obj->period])
    </div>
</div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-ADDRESS===</b>
        </div>
    </div>
@endif