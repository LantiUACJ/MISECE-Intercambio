@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===EXPRESION===</b>
        </div>
    </div>
@endif
@include('fhir.element.element',["obj"=>$obj])

@if (isset($obj->description))
	{{$obj->description}}
@endif
@if (isset($obj->name))
	{{$obj->name}}
@endif
@if (isset($obj->language))
	{{$obj->language}}
@endif
@if (isset($obj->expression))
	{{$obj->expression}}
@endif
@if (isset($obj->reference))
	{{$obj->reference}}
@endif

@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===END-EXPRESION===</b>
        </div>
    </div>
@endif