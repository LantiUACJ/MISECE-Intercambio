<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="{{asset('styles.css')}}?v=1.0.0.1">

        @include('_pdfCss')

        <title>Document</title>
    </head>
    <body>
        <div class="pdf">
            @include("_pdf",["data"=>$data])
        </div>


        @if (isset($extra))
            Cargar datos: {{ number_format($extra["datos"] - $extra["inicio"],4)*1000 }} ms <br>
            Procesamiento: {{ number_format(microtime(true) - $extra["datos"],4)*1000 }} ms <br>
            Total: {{ number_format(microtime(true) - $extra["inicio"],4)*1000 }} ms <br>
        @endif

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.tooltipped').tooltip();
            });
            $(document).ready(function(){
                $('.collapsible').collapsible();
            });
        </script>
    </body>
</html>