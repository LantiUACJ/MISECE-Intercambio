@if (env("TEST", false))
	<div class="row">
		<div class="col s12">
			<b>===IDENTIFIER===</b>
		</div>
	</div>
@endif
@include('fhir.element.element',["obj"=>$obj])
@if (isset($obj->use))
	El identificador es <b>{{str_replace(["usual","official","temp","secondary","old"], ["Usual","Oficial","Temporal","Secundario","Viejo"], strtolower($obj->use)) }}</b>.
@endif
@if (isset($obj->system))
	Es del sistema: {{$obj->system}}.
@endif
@if (isset($obj->period))
	Dentro del período: @include('fhir.element.period',["obj"=>$obj->period]).
@endif
@if (isset($obj->assigner))
	Asignado Por:  @include('fhir.element.reference',["obj"=>$obj->assigner]).
@endif
@if (isset($obj->type))
	@include('fhir.element.codeableConcept',["obj"=>$obj->type])
@endif
@if (isset($obj->value))
	<b>{{$obj->value}}</b>
@endif
@if (env("TEST", false))
	<div class="row">
		<div class="col s12">
			<b>===END-IDENTIFIER===</b>
		</div>
	</div>
@endif