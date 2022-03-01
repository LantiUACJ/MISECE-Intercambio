<div class="row">
    <div class="col-xs-12">
        <b>===MEDICATION===</b>
    </div>
</div>
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col-xs-12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col-xs-6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>
@endif
@if (isset($obj->code))
    <div class="row">
        <div class="col-xs-12">
            Código
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->code])
        </div>
    </div>
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col-xs-12">
            Estado {{ str_replace(["registered", "inactive", "entered-in-error"], ["Activo", "Inactivo", "Con error"], strtolower($obj->status))}}
        </div>
        <div class="col-xs-12">
            
        </div>
    </div>
@endif
@if (isset($obj->manufacturer))
    <div class="row">
        <div class="col-xs-12">
            Manufacturador
        </div>
        <div class="col-xs-12">
            @include('fhir.element.reference',["obj"=>$obj->manufacturer])
        </div>
    </div>
@endif
@if (isset($obj->form))
    <div class="row">
        <div class="col-xs-12">
            Forma
        </div>
        <div class="col-xs-12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->form])
        </div>
    </div>
@endif
@if (isset($obj->amount))
    <div class="row">
        <div class="col-xs-12">
            Cantidad
        </div>
        <div class="col-xs-12">
            @include('fhir.element.ratio',["obj"=>$obj->amount])
        </div>
    </div>
@endif
@if (isset($obj->ingredient))
    <div class="row">
        <div class="col-xs-12">
            Ingrediente
        </div>
        <div class="col-xs-12">
            @if (isset($obj->ingredient))
                <div class="row">
                    @foreach ($obj->ingredient as $ingredient)
                        @if (isset($ingredient->itemCodeableConcept)) 
                            <div class="col-xs-6">
                                Objeto <br>
                                @include('fhir.element.codeableConcept',["obj"=>$ingredient->itemCodeableConcept])
                            </div>
                        @endif
                        @if (isset($ingredient->itemReference))
                            <div class="col-xs-6">
                                Objeto <br>
                                @include('fhir.element.reference',["obj"=>$ingredient->itemReference])
                            </div>
                        @endif
                        @if (isset($ingredient->isActive)) 
                            <div class="col-xs-6">
                                Activo <br>
                                {{$ingredient->isActive?"SI":"NO"}}
                            </div>
                        @endif
                        @if (isset($ingredient->strength)) 
                            <div class="col-xs-6">
                                Fuerza <br>
                                @include('fhir.element.ratio',["obj"=>$ingredient->strength])
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
@if (isset($obj->batch))
    <div class="row">
        <div class="col-xs-2">
            Lote:
        </div>
        @if (isset($obj->batch->lotNumber))
            <div class="col-xs-4">
                <b>Número de lote:</b>
                {{$obj->batch->lotNumber}}
            </div>
        @endif
        @if (isset($obj->batch->expirationDate))
            <div class="col-xs-4">
                <b>Fecha de expiración:</b>
                {{$obj->batch->expirationDate}}
            </div>
        @endif
    </div>
@endif

<div class="row">
    <div class="col-xs-12">
        <b>===END-MEDICATION===</b>
    </div>
</div>