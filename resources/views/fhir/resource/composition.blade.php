@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===composition===</b>
        </div>
    </div>
@endif
@include('fhir.resource.domainResource',["obj"=>$obj])
@if (isset($obj->identifier))
    <div class="row">
        <div class="col s12">
            Identificador
        </div>
        @foreach ($obj->identifier as $identifier)
            <div class="col s6">
                @include('fhir.element.identifier',["obj"=>$identifier])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->status))
    <div class="row">
        <div class="col s12">
            Estado: {{ str_replace(["preliminary", "final","amended","entered-in-error"],
                                   ["preliminary", "final","amended","entered-in-error"], strtolower($obj->status))}}
        </div>
    </div>
@endif
@if (isset($obj->type))
    <div class="row">
        <div class="col s12">
            Tipo
        </div>
        <div class="col s12">
            @include('fhir.element.codeableConcept',["obj"=>$obj->type])
        </div>
    </div>
@endif
@if (isset($obj->category))
    <div class="row">
        <div class="col s12">
            Categoría
        </div>
        @foreach ($obj->category as $category)
            <div class="col s6">
                @include('fhir.element.codeableConcept',["obj"=>$category])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->subject))
    <div class="row">
        <div class="col s12">
            Sujeto
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->subject])
        </div>
    </div>
@endif
@if (isset($obj->encounter))
    <div class="row">
        <div class="col s12">
            Visita
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->encounter])
        </div>
    </div>
@endif
@if (isset($obj->date))
    <div class="row">
        <div class="col s12">
            Estado: {{ $obj->date }}
        </div>
    </div>
@endif
@if (isset($obj->author))
    <div class="row">
        <div class="col s12">
            Autor
        </div>
        @foreach ($obj->author as $author)
            <div class="col s6">
                @include('fhir.element.reference',["obj"=>$author])
            </div>
        @endforeach
    </div>    
@endif
@if (isset($obj->title))
    <div class="row">
        <div class="col s12">
            Título: {{ $obj->title }}
        </div>
    </div>
@endif
@if (isset($obj->confidentiality))
    <div class="row">
        <div class="col s12">
            Título: {{ $obj->confidentiality }}
        </div>
    </div>
@endif
@if (isset($obj->attester))
    <div class="row">
        <div class="col s12">
            Tipo:
        </div>
        <div class="col s12">
            @foreach ($obj->attester as $attester)
                <div class="row">
                    @if (isset($attester->mode))
                        <div class="col s12">
                            {{$attester->mode}}
                        </div>
                    @endif
                    @if (isset($attester->time))
                        <div class="col s12">
                            {{$attester->time}}
                        </div>
                    @endif
                    @if (isset($attester->party))
                        <div class="col s12">
                            @include('fhir.element.reference',["obj"=>$attester->party])
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->custodian))
    <div class="row">
        <div class="col s12">
            Custodio:
        </div>
        <div class="col s12">
            @include('fhir.element.reference',["obj"=>$obj->custodian])
        </div>
    </div>
@endif
@if (isset($obj->relatesTo))
    <div class="row">
        <div class="col s12">
            Relacionado a:
        </div>
        <div class="col s12">
            @foreach ($obj->relatesTo as $relatesTo)
                <div class="row">
                    @if (isset($relatesTo->code))
                        <div class="col s12">
                            {{$relatesTo->code}} <!-- replaces | transforms | signs | appends -->
                        </div>
                    @endif
                    @if (isset($relatesTo->targetIdentifier))
                        <div class="col s12">
                            @include('fhir.element.identifier',["obj"=>$relatesTo->targetIdentifier])
                        </div>
                    @endif
                    @if (isset($relatesTo->targetReference))
                        <div class="col s12">
                            @include('fhir.element.reference',["obj"=>$relatesTo->targetReference])
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->event))
    <div class="row">
        <div class="col s12">
            Evento:
        </div>
        <div class="col s12">
            @foreach ($obj->event as $event)
                <div class="row">
                    @if (isset($event->code))
                        @foreach ($event->code as $code)
                            <div class="col s12">
                                @include('fhir.element.codeableConcept',["obj"=>$code])
                            </div>
                        @endforeach
                    @endif
                    @if (isset($event->period))
                        <div class="col s12">
                            @include('fhir.element.period',["obj"=>$event->period])
                        </div>
                    @endif
                    @if (isset($event->detail))
                        @foreach ($event->detail as $detail)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$detail])
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
@if (isset($obj->section))
    <div class="row">
        <div class="col s12">
            Sección:
        </div>
        <div class="col s12">
            @foreach ($obj->section as $section)
                <div class="row">
                    @if (isset($section->title))
                        <div class="col s12">
                            {{$section->title}}
                        </div>
                    @endif
                    @if (isset($section->code))
                        <div class="col s12">
                            @include('fhir.element.codeableConcept',["obj"=>$section->code])
                        </div>
                    @endif
                    @if (isset($section->author))
                        @foreach ($section->author as $author)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$author])
                            </div>
                        @endforeach
                    @endif
                    @if (isset($section->focus))
                        <div class="col s12">
                            @include('fhir.element.reference',["obj"=>$section->focus])
                        </div>
                    @endif
                    @if (isset($section->text))
                        <div class="col s12">
                            @include('fhir.element.narrative',["obj"=>$section->text])
                        </div>
                    @endif
                    @if (isset($section->mode))
                        <div class="col s12">
                            {{$section->mode}} <!-- working | snapshot | changes-->
                        </div>
                    @endif
                    @if (isset($section->orderedBy))
                        <div class="col s12">
                            @include('fhir.element.codeableConcept',["obj"=>$section->orderedBy])
                        </div>
                    @endif
                    @if (isset($section->entry))
                        @foreach ($section->entry as $entry)
                            <div class="col s12">
                                @include('fhir.element.reference',["obj"=>$entry])
                            </div>
                        @endforeach
                    @endif
                    @if (isset($section->emptyReason))
                        <div class="col s12">
                            @include('fhir.element.codeableConcept',["obj"=>$section->emptyReason])
                        </div>
                    @endif
                    @if (isset($section->section))
                        @foreach ($section->section as $section)
                            <div class="col s12">
                                @include('fhir.element.codeableConcept',["obj"=>$section])
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
@if (env("TEST", false))
    <div class="row">
        <div class="col s12">
            <b>===composition===</b>
        </div>
    </div>
@endif