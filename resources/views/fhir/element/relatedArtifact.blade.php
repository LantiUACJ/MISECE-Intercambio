<div class="row">
    <div class="col-xs-12">
        <b>===RELATEDARTIFACT===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "type" : "<code>", // R!  documentation | justification | citation | predecessor | successor | derived-from | depends-on | composed-of
    "label" : "<string>", // Short label
    "display" : "<string>", // Brief description of the related artifact
    "citation" : "<markdown>", // Bibliographic citation for the artifact
    "url" : "<url>", // Where the artifact can be accessed
    "document" : { Attachment }, // What document is being referenced
    "resource" : { canonical(Any) } // What resource is being referenced
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-RELATEDARTIFACT===</b>
    </div>
</div>