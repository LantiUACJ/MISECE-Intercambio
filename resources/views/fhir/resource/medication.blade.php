@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===MEDICATION===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <p><b>Identificador:</b></p>
    @foreach ($obj->identifier as $identifier)
        <div class="element">
            @include('fhir.element.identifier',["obj"=>$identifier])
        </div>
    @endforeach
@endif
@if (isset($obj->code))
    <p><b>Código:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->code])
    </div>
@endif
@if (isset($obj->status))
    <p><b>Estado:</b>
        {{ str_replace(
            ["registered", "inactive", "entered-in-error"], 
            ["Activo", "Inactivo", "Con error"], strtolower($obj->status))}}
    </p>
@endif
@if (isset($obj->manufacturer))
    <p><b>Manufacturador:</b></p>
    <div class="element">
        @include('fhir.element.reference',["obj"=>$obj->manufacturer])
    </div>
@endif
@if (isset($obj->form))
    <p><b>Forma:</b></p>
    <div class="element">
        @include('fhir.element.codeableConcept',["obj"=>$obj->form])
    </div>
@endif
@if (isset($obj->amount))
    <p><b>Cantidad:</b></p>
    <div class="element">
        @include('fhir.element.ratio',["obj"=>$obj->amount])
    </div>
@endif
@if (isset($obj->ingredient))
    <p><b>Ingrediente:</b></p>
    <div class="element">
        @if (isset($obj->ingredient))
            @foreach ($obj->ingredient as $ingredient)
                @if (isset($ingredient->itemCodeableConcept)) 
                    <p><b>Objeto:</b></p>
                    <div class="element">
                        @include('fhir.element.codeableConcept',["obj"=>$ingredient->itemCodeableConcept])
                    </div>
                @endif
                @if (isset($ingredient->itemReference))
                    <p><b>Objeto:</b></p>
                    <div class="element">
                        @include('fhir.element.reference',["obj"=>$ingredient->itemReference])
                    </div>
                @endif
                @if (isset($ingredient->isActive)) 
                    <p><b>Activo:</b></p>
                    <div class="element">
                        {{$ingredient->isActive?"SI":"NO"}}
                    </div>
                @endif
                @if (isset($ingredient->strength)) 
                    <p><b>Fuerza:</b></p>
                    <div class="element">
                        @include('fhir.element.ratio',["obj"=>$ingredient->strength])
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endif
@if (isset($obj->batch))
    <p><b>Lote:</b></p>
    <div class="element">
        @if (isset($obj->batch->lotNumber))
            <p><b>Número de lote:</b></p>
            <div class="element">
                {{$obj->batch->lotNumber}}
            </div>
        @endif
        @if (isset($obj->batch->expirationDate))
            <p><b>Fecha de expiración:</b></p>
            <div class="element">
                {{$obj->batch->expirationDate}}
            </div>
        @endif
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="element">
            <b>===END-MEDICATION===</b>
        </div>
    </div>
@endif