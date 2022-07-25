@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===composition===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->status))
    <p><b>Estado:</b>{{ str_replace(["preliminary", "final","amended","entered-in-error"],["preliminary", "final","amended","entered-in-error"], strtolower($obj->status))}}</p>
@endif
@if (isset($obj->type))
    <p><b>Tipo:</b>
        @include('fhir.element.codeableConcept',["obj"=>$obj->type])
    </p>
@endif
@if (isset($obj->category) && $obj->category)
    <p><b>Categoría(s):</b></p>
    <div class="element">
        @foreach ($obj->category as $category)
            * @include('fhir.element.codeableConcept',["obj"=>$category]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->subject))
    <p><b>Sujeto:</b>
        @include('fhir.element.reference',["obj"=>$obj->subject])
    </p>
@endif
@if (isset($obj->encounter))
    <p><b>Visita:</b>
        @include('fhir.element.reference',["obj"=>$obj->encounter])
    </p>
@endif
@if (isset($obj->date))
    <p><b>Estado:</b> {{ $obj->date }}</p>
@endif
@if (isset($obj->author) && $obj->author)
    <p><b>Autor(es):</b></p>
    <div class="element">
        @foreach ($obj->author as $author)
            * @include('fhir.element.reference',["obj"=>$author]) <br>
        @endforeach
    </div>
@endif
@if (isset($obj->title))
    <p><b>Título:</b> {{ $obj->title }}</p>
@endif
@if (isset($obj->confidentiality))
    <p><b>Confidencialidad:</b> {{ $obj->confidentiality }}</p>
@endif
@if (isset($obj->attester) && $obj->attester)
    <p><b>Atestiguaron:</b></p>
    <div class="element">
        @foreach ($obj->attester as $attester)
            @if (isset($attester->mode))
                <p><b>Modo:</b> {{$attester->mode}}</p>
            @endif
            @if (isset($attester->time))
                <p><b>Tiempo:</b> {{$attester->time}}</p>
            @endif
            @if (isset($attester->party))
                <p><b>Atestiguó:</b>
                    @include('fhir.element.reference',["obj"=>$attester->party])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->custodian))
    <p><b>Custodio:</b> @include('fhir.element.reference',["obj"=>$obj->custodian])</p>
@endif
@if (isset($obj->relatesTo) && $obj->relatesTo)
    <p><b>Relacionado a:</b></p>
    <div class="element">
        @foreach ($obj->relatesTo as $relatesTo)
            @if (isset($relatesTo->code))
                <p><b>código:</b>
                    {{str_replace(["replaces","transforms","signs","appends"],["Remplaza","Transforma","Señala","Agrega"],$relatesTo->code)}} <!--  -->
                </p>
            @endif
            @if (isset($relatesTo->targetIdentifier))
                <p><b>Identificador:</b>
                    @include('fhir.element.identifier',["obj"=>$relatesTo->targetIdentifier])
                </p>
            @endif
            @if (isset($relatesTo->targetReference))
                <p><b>Referencia:</b>
                    @include('fhir.element.reference',["obj"=>$relatesTo->targetReference])
                </p>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->event) && $obj->event)
    <p><b>Evento:</b></p>
    <div class="element">
        @foreach ($obj->event as $event)
            @if (isset($event->code) && $event->code)
                <p><b>Código:</b></p>
                <div class="element">
                    @foreach ($event->code as $code)
                        * @include('fhir.element.codeableConcept',["obj"=>$code]) <br>
                    @endforeach
                </div>
            @endif
            @if (isset($event->period))
                <p><b>Período: </b>@include('fhir.element.period',["obj"=>$event->period])</p>
            @endif
            @if (isset($event->detail) && $event->detail)
                <p><b>Detalle:</b></p>
                <div class="element">
                    @foreach ($event->detail as $detail)
                        * @include('fhir.element.reference',["obj"=>$detail]) <br>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
@endif
@if (isset($obj->section) && $obj->section)
    <p><b>Sección:</b></p>
    <div class="element">
        @foreach ($obj->section as $section)
            @include('fhir.element.compositionSection', ["obj"=>$section, "key"=>0])
            <hr>
        @endforeach
    </div>
@endif
@if (isset($obj->identifier))
    <p><b>Identificador:</b> @include('fhir.element.identifier',["obj"=>$obj->identifier])</p>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===composition===</b>
        </div>
    </div>
@endif