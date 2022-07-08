<style>
    @import url("Smooch-Regular.ttf");

    .bloque{
        margin-bottom: 10px;
        /*background-color: rgba(255,255,255);*/
    }
    .element{
        margin-left: 10px;
        @if (env("TEST", false))
        background-color: rgba(0,0,0,0.1);
        @endif
    }
    div{
        word-wrap: break-word;
    }
    .pdf *.row{
        border: 1px solid black;
        width: 100%;
    }
    .col .row {
        margin-left: 0rem !important;
        margin-right: 0rem !important;
    }
    .resource{
        border: 1px solid black;
        padding: 10px;
        /*background-color: rgb(201, 201, 201) !important;*/
    }
    .patient{
        background-color: rgba(243, 157, 201,0.5) !important;
    }
    .encounter{
        background-color: rgba(101, 221, 211, 0.5) !important;
    }
    .observation{
        background-color: rgba(226, 226, 226, 0.5) !important;
    }
    .medicationAdmin{
        background-color: rgba(116, 250, 255, 0.5) !important;
    }
    .diagnosticReport{
        background-color: rgba(255, 160, 176, 0.5) !important;
    }
    .imagingStudy{
        background-color: rgba(0, 255, 42, 0.5) !important;
    }
    .medication{
        background-color: rgba(0, 153, 255, 0.5) !important;
    }
    .organization{
        background-color: rgba(207, 190, 233, 0.774) !important;
    }
    .practitioner{
        background-color: rgba(255, 166, 0, 0.5) !important;
    }
    .procedure{
        background-color: rgba(128, 255, 223, 0.5) !important;
    }
    .carePlan{
        background-color: rgba(218, 119, 135, 0.5) !important;
    }
    .allergy{
        background-color: rgba(204, 108, 207, 0.5) !important;
    }
    .location{
        background-color: rgba(255,255,0,0.5) !important;
    }
    .condition{
        background-color: rgba(255, 115, 0, 0.5) !important;
    }
    .practitionerrole{
        background-color: rgba(255, 0, 0, 0.5) !important;
    }
    .composition{
        background-color: rgba(216, 141, 141, 0.5) !important;
    }
    .bundle{
        background-color: rgb(0, 255, 170) !important;
    }
    .undefined{
        background-color: rgba(100,100,100,0.5) !important;
    }
</style>