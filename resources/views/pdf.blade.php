<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('styles.css')}}?v=1.0.0.1">

        <style>
            .bloque{
                margin-bottom: 10px;
                /*background-color: rgba(0,0,0,0.2);*/
            }
            div{
                word-wrap: break-word;
            }
            div.row{
                border: 1px solid black;
                width: 100%;
            }
            table{
                border: 1px solid black;
            }
            td{
                border: 1px solid black;
            }

            .patient{
                background-color: rgb(255, 236, 236) !important;
            }
            .encounter{
                background-color: rgb(202, 202, 202) !important;
            }
            .observation{
                background-color: rgb(209, 247, 165) !important;
            }
            .medicationAdmin{
                background-color: #68d4d8 !important;
            }
            .diagnosticReport{
                background-color: #abddab !important;
            }
            .imagingStudy{
                background-color: #caaef7 !important;
            }
            .medication{
                background-color: #dbee87 !important;
            }
            .organization{
                background-color: #57aeff !important;
            }
            .practitioner{
                background-color: #80a389 !important;
            }
            .procedure{
                background-color: #d3bfda !important;
            }
        </style>
        <title>Document</title>
    </head>
    <body>
        @include("_pdf",["data"=>$data])
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>