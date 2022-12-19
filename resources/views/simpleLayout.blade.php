<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MISECE</title>

    <!-- Material -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="{{asset('styles.css')}}">
</head>
<body class="login-bg">
    <div class=" box">
        <div class="row fh">
            <div class="col s12 m6 fh center left-panel">
                <div class="login-logo">
                    <a href="{{url("/")}}">
                        <img src="{{asset("logomisece.svg")}}">
                    </a>
                </div>
            </div>
            <div class="col s12 m6 fh card-padding ">
                <div class="white-card login-card fh center">
                    <div class="login-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        });
    </script>

</body>
</html>