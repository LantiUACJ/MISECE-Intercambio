@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===NARRATIVE===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->status))
    
    Estado
    {{ str_replace(["generated","extensions","additional","empty"],["Generado","Extensiones","Adicional","Vacío"],strtolower($obj->status))}}

@endif
@if (isset($obj->div))
    
    Texto
    {{ $obj->div }}
	
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-NARRATIVE===</b>
        </div>
    </div>
@endif