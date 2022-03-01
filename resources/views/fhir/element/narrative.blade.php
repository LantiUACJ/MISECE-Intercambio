<div class="row">
    <div class="col-xs-12">
        <b>===NARRATIVE===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->status))
    
    Estado
    {{ str_replace(["generated","extensions","additional","empty"],["Generado","Extensiones","Adicional","Vacío"],strtolower($obj->status))}}

@endif
@if (isset($obj->div))
    
    Texto
    {{ $obj->div }}
	
@endif
<div class="row">
    <div class="col-xs-12">
        <b>===END-NARRATIVE===</b>
    </div>
</div>