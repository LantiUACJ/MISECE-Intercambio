@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===CONTACTPOINT===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->system))
    {{ str_replace(["phone","fax","email","pager","url","sms","other"],["Teléfono","Fax","Correo Electrónico","Beeper","URL","SMS","Otro"],strtolower($obj->system)) }}
@endif
@if (isset($obj->value))
    {{$obj->value}}
@endif
@if (isset($obj->use))
    Tipo: {{ str_replace(["home","work","temp","old","mobile"], ["Hogar","Trabajo","Temporal","Hogar viejo","Celular"], strtolower($obj->use))}}
@endif
@if (isset($obj->rank))
    Rango: {{$obj->rank}}
@endif
@if (isset($obj->period))
    Período @include('fhir.element.period',["obj"=>$obj->period])
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-CONTACTPOINT===</b>
        </div>
    </div>
@endif