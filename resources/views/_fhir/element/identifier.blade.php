@if (env("TEST", false))
	<div class="row">
		<div class="col-12">
			<b>===IDENTIFIER===</b>
		</div>
	</div>
@endif
@include('fhir.element.element',["obj"=>$obj])
<div class="row">
	@if (isset($obj->use))
		<div class="col-12">
			Tipo de Uso: {{str_replace(["usual","official","temp","secondary","old"], ["Usual","Oficial","Temporal","Secundario","Viejo"], strtolower($obj->use)) }}
		</div>
	@endif
	@if (isset($obj->system))
		<!--<div class="col-4"> 
			Sistema:
		</div>
		<div class="col-8">
			{{$obj->system}}
		</div>-->
	@endif
	@if (isset($obj->period))
		<div class="col-4">
			Período:
		</div>
		<div class="col-8">
			@include('fhir.element.period',["obj"=>$obj->period])
		</div>
	@endif
	@if (isset($obj->assigner))
		<div class="col-4">
			Asignado Por:
		</div>
		<div class="col-8">
			@include('fhir.element.reference',["obj"=>$obj->assigner])
		</div>
	@endif
	@if (isset($obj->type))
		<div class="col-12">
			@include('fhir.element.codeableConcept',["obj"=>$obj->type])
		</div>
	@endif
	@if (isset($obj->value))
		<div class="col-12">
			<b>{{$obj->value}}</b>
		</div>
	@endif
</div>
@if (env("TEST", false))
	<div class="row">
		<div class="col-12">
			<b>===END-IDENTIFIER===</b>
		</div>
	</div>
@endif