<div class="row">
    <div class="col-xs-12">
        <b>===CONTRIBUTOR===</b>
    </div>
</div>
@include('fhir.element.element',["obj"=>$obj])

{doco
    // from Element: extension
    "type" : "<code>", // R!  author | editor | reviewer | endorser
    "name" : "<string>", // R!  Who contributed the content
    "contact" : [{ ContactDetail }] // Contact details of the contributor
}
<div class="row">
    <div class="col-xs-12">
        <b>===END-CONTRIBUTOR===</b>
    </div>
</div>